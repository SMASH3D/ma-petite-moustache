<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use StatsBundle\Entity\RealLeague;
use StatsBundle\Entity\RealTeam;
use StatsBundle\Entity\RealMatch;
use StatsBundle\Entity\Player;
use StatsBundle\Entity\PlayerRealMatch;

/**
 * Aggregator
 */
class Aggregator
{
    private $_teamsArray = array();
    private $_realMatches = array();
    private $_teamsArrayById = array();
    private $_weekSummary = array();
    private $_playersArray = array();
    private $_playerQuotations = array();
    private $_code = 201;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Container
     */
    private $container;

    // We need to inject this variables later.
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }


    /**
     * aggregates data for a specific match
     *
     * @param array $matchDetails the match data
     *
     * @return integer $code the return code
     */
    public function aggregateMatchDetails($matchDetails)
    {
        $this->_matchDetails = $matchDetails;
        $league = $this->_getLeague($matchDetails['championship']);
        $code = $this->_setMatchDetails($league);
        if ($code == 200) {
            $this->_updatePlayers($league);
        }
        return $code;
    }

    /**
     * aggregates data for a whole week
     *
     * @param array $weekData the week data sent by the extension
     * 
     * @return integer $code the return code
     */
    public function aggregateWeekSummary($weekData)
    {
        $this->_weekSummary = $weekData;
        $league = $this->_getLeague($this->_weekSummary['championshipID'], $this->_weekSummary['championship']);
        $code = $this->_setWeekRealGames($league);
        if ($code == 200) {
            $this->_updateWeekData($league);
            $this->updateRankings($league);
        }
        return $code;
    }

    public function aggregatePlayerQuotations($playerQuotations)
    {
        $this->_playerQuotations = $playerQuotations;
        $league = $this->_getLeague($this->_playerQuotations['championshipID'], $this->_playerQuotations['championship']);
        $code = $this->_setPlayersQuotations($league);
        return $code;
    }

    private function _setPlayersQuotations($league)
    {
        $this->_getPlayersArray($league);
        foreach ($this->_playerQuotations['players'] as $playerQuotation) {
            $teamplayers = $this->_playersArray[$playerQuotation['t']];

            if (isset($teamplayers) && isset($teamplayers[$playerQuotation['l']])) {
                $player = $teamplayers[$playerQuotation['l']];
                /** @var $player Player */
            } else {
                $this->_code = 200;
                //$player doesn't seem to exist yet
                $player = New Player();

                $player->setLastname(trim($playerQuotation['l']));
                $team = $this->_getTeamByName($playerQuotation['t'], $league);
                $player->setRealTeam($team);
                $player->setRealLeague($team->getRealLeague());
            }

            $player->setFirstname(trim($playerQuotation['f']));
            $player->setPrice(trim($playerQuotation['q']));
            $player->setRole(trim($playerQuotation['p']));
            $this->em->persist($player);
        }
        $this->em->flush();
    }

    private function _updatePlayers($league) 
    {
        //Read all playermatches and update player accordingly
       /* $players = $this->em
            ->getRepository('StatsBundle:Player')
            ->findBy(
                array(
                    'realLeagueId' => $league->getId()
                )
            );
        foreach ($players as $player) {
            $this->_aggregatePlayerData($player);
        }*/
    }

    private function _aggregatePlayerData($player)
    {
        /*$playermatchs = $this->em
            ->getRepository('StatsBundle:PlayerRealMatch')
            ->findOneBy(
                array(
                    'playerId' => $player->getId()
                )
            );

        $startedGames = array();
        foreach ($playermatchs as $playermatch) {
            $season = $playermatch->getRealMatch()->getSeason();
            $week = $playermatch->getRealMatch()->getWeek();

            if ($playermatch->getHasStarted()) {
                $startedGames[] = array(
                    'season' => $season,
                    'week' => $week
                );
            } else {
                $enteredGames[] = array(
                    'season' => $season,
                    'week' => $week
                );
            }

        }*/
    }
    
    
    /**
     * Gets an instance of the current league, creates it if it doesn't exist
     *
     * @param integer $championshipId the league ID
     * @param string  $name           the league name
     *
     * @return object|RealLeague
     */
    private function _getLeague($championshipId, $name = null)
    {
        $league = $this->em
            ->getRepository('StatsBundle:RealLeague')
            ->findOneBy(array('mpgId' => $championshipId));
        $needDbUpdate = false;

        if (is_null($league) && !is_null($championshipId) && !is_null($name)) {
            $needDbUpdate = true;
            $league = New RealLeague($championshipId, $name);
        }
        if (!empty($this->_weekSummary) && isset($this->_weekSummary['week'])) {
            if ($league->getUpcomingWeek() < (int) $this->_weekSummary['week']) {
                $needDbUpdate = true;
                $league->setUpcomingWeek((int) $this->_weekSummary['week']+1);
            }
        }

        if ($needDbUpdate) {
            $em = $this->em;
            $em->persist($league);
            $em->flush();
        }

        return $league;
    }

    /**
     * _setMatchDetails
     *
     * @param $league
     */
    private function _setMatchDetails($league)
    {
        $this->_code = 201;
        $matchId = (isset($this->_matchDetails['match']) ? $this->_matchDetails['match'] : null);
        $match = $this->_getRealMatch($matchId, $this->_matchDetails, $league);
        $homeTeam = $this->_getTeamByName($this->_matchDetails['homeTeam']['name'], $league);
        $awayTeam = $this->_getTeamByName($this->_matchDetails['awayTeam']['name'], $league);

        foreach ($this->_matchDetails['homeTeam']['scorers'] as $scorer) {
            if (!in_array($scorer['player'], array_keys($this->_matchDetails['homeTeam']['players']))) {
                $this->_matchDetails['awayTeam']['players'][$scorer['player']]['own_goals']++;
                $this->_matchDetails['awayTeam']['players'][$scorer['player']]['goals']--;
            }
        }
        foreach ($this->_matchDetails['awayTeam']['scorers'] as $scorer) {
            if (!in_array($scorer['player'], array_keys($this->_matchDetails['awayTeam']['players']))) {
                $this->_matchDetails['homeTeam']['players'][$scorer['player']]['own_goals']++;
                $this->_matchDetails['homeTeam']['players'][$scorer['player']]['goals']--;
            }
        }
        foreach ($this->_matchDetails['homeTeam']['players'] as $playerPerformance) {
            $player = $this->_getPlayer($playerPerformance['name'], $homeTeam);
            $playerMatch = $this->_getPlayerMatch($player, $match);
            $this->_updatePlayerMatchDetails($playerMatch, $playerPerformance);

        }
        foreach ($this->_matchDetails['awayTeam']['players'] as $playerPerformance) {
            $player = $this->_getPlayer($playerPerformance['name'], $awayTeam);
            $playerMatch = $this->_getPlayerMatch($player, $match);
            $this->_updatePlayerMatchDetails($playerMatch, $playerPerformance);
        }
        return $this->_code;
    }

    /**
     * _updatePlayerMatchDetails
     *
     * @param PlayerRealMatch $playerMatch player match
     * @param array           $details     details
     *
     * @return void
     */
    private function _updatePlayerMatchDetails($playerMatch, $details)
    {
        if (!empty($details)) {
            $this->_code = 200;
            $playerMatch->setRating($details['rating']);
            $playerMatch->setHasStarted($details['starter']);
            $playerMatch->setMinutesPlayed($details['starter']?90:30);
            $playerMatch->setHasEntered(!$details['starter']);

            $playerMatch->setGoals($details['goals']);
            $playerMatch->setOwnGoals($details['own_goals']);

            $playerMatch->setRating($details['rating']);
            $this->em->persist($playerMatch);
            $this->em->flush();
        } else {
            $this->_code = 300;
        }
    }

    /**
     * @param Player   $player
     * @param integer  $matchID
     *
     * @return array|PlayerRealMatch
     */
    private function _getRealMatch($matchID, $details, $league)
    {
        $realMatch = $this->em
            ->getRepository('StatsBundle:RealMatch')
            ->findOneBy(
                array(
                    'mpgId' => $matchID
                )
            );
        if ($realMatch == null) {
            $this->_code = 200;
            //no entry for this match, let's create it
            $realMatch = New RealMatch();
            $realMatch->setMpgId($matchID);
        }

        $realMatch->setSeason(date('Y'));
        $realMatch->setRealLeagueId($league->getId());
        $realMatch->setPlayed(true);
        $realMatch->setHomeTeamScore($details['homeTeam']['score']);
        $realMatch->setAwayTeamScore($details['awayTeam']['score']);
        $homeTeam = $this->_getTeamByName($details['homeTeam']['name'], $league);
        $awayTeam = $this->_getTeamByName($details['awayTeam']['name'], $league);
        $realMatch->setHomeTeam($homeTeam);
        $realMatch->setAwayTeam($awayTeam);

        $this->em->persist($realMatch);
        $this->em->flush();

        return $realMatch;
    }

    /**
     * _getPlayerMatch
     *
     * @param Player   $player  the player
     * @param Match    $match   the match
     *
     * @return array|PlayerRealMatch
     */
    private function _getPlayerMatch($player, $match)
    {
        $playerMatch = $this->em
            ->getRepository('StatsBundle:PlayerRealMatch')
            ->findOneBy(
                array(
                    'playerId' => $player->getId(),
                    'realMatchId' => $match->getId()
                )
            );
        if ($playerMatch == null) {
            $this->_code = 200;
            //no entry for this player match, let's create it
            $playerMatch = New PlayerRealMatch();
            $playerMatch->setRealMatch($match);
            $playerMatch->setRealMatchId($match->getId());
            $playerMatch->setPlayer($player);
            $playerMatch->setPlayerId($player->getId());
            $this->em->persist($playerMatch);
            $this->em->flush();
        }
        return $playerMatch;
    }

    /**
     * Returns an instance of Player matching the provided criteria -
     * let's hope that we don't get players with the same lastname within a team
     *
     * @param string   $lastname player's lastname
     * @param RealTeam $team     player's team
     *
     * @return mixed|Player
     */
    private function _getPlayer($lastname, $team)
    {
        $player = $this->em
            ->getRepository('StatsBundle:Player')
            ->findOneBy(
                array(
                    'lastname'   => $lastname,
                    'realTeamId' => $team->getId()
                )
            );

        if ($player == null) {
            $this->_code = 200;
            //$player doesn't seem to exist yet
            $player = New Player();
            $player->setLastname($lastname);
            $player->setRealTeam($team);
            $player->setRealLeague($team->getRealLeague());
            $this->em->persist($player);
            $this->em->flush();
        }
        return $player;
    }

    /**
     * fetches existing players for a team and returns them in an array indexed on their lastname
     *
     * BUGGED - DO NOT USE : CAUSES AWAY TEAM PLAYERS DUPLICATION
     *
     * @param RealLeague $league the current league
     *
     * @return array
     */
    private function _getPlayersArray($league)
    {
        if (empty($this->_playersArray)) {
            $players = $this->em
                ->getRepository('StatsBundle:Player')
                ->findBy(
                    array(
                        'realLeagueId' => $league->getMpgId()
                    )
                );
            foreach ($players as $player) {
                if (!isset($this->_playersArray[$player->getRealTeam()->getName()])) {
                    $this->_playersArray[$player->getRealTeam()->getName()] = array();
                }
                $this->_playersArray[$player->getRealTeam()->getName()][$player->getLastname()] = $player;
            }
        }
        return $this->_playersArray;
    }

    /**
     * _setWeekRealGames
     *
     * @param RealLeague $league The Real league
     *
     * @return integer $code the return code
     */
    private function _setWeekRealGames($league)
    {
        $code = 201;
        $needDbUpdate = false;
        $week = (isset($this->_weekSummary['week']) ? $this->_weekSummary['week'] : null);
        $games = (isset($this->_weekSummary['games']) ? $this->_weekSummary['games'] : array());

        $realMatches = $this->em
            ->getRepository('StatsBundle:RealMatch')
            ->findBy(array('mpgId' => array_keys($games)));
        //loop through existing matches to see whether we have something to update
        foreach ($realMatches as $realMatch) {
            //removing the updated game from the pool of games to treat
            unset($games[$realMatch->getMpgId()]);
            $this->_realMatches[]=$realMatch;
        }
        //we need to create the remaining ones
        foreach ($games as $game) {
            if (isset($game['url'])) {
                $needDbUpdate = true;
                $realMatch = New RealMatch();
                $realMatch->setMpgId($game['id']);
                $realMatch->setSeason(date('Y'));
                $realMatch->setWeek($week);
                $realMatch->setRealLeague($league);
                $realMatch->setPlayed(true);
                $realMatch->setHomeTeamScore($game['homeTeamScore']);
                $realMatch->setAwayTeamScore($game['awayTeamScore']);
                $homeTeam = $this->_getTeamByName($game['homeTeam'], $league);
                $awayTeam = $this->_getTeamByName($game['awayTeam'], $league);
                $realMatch->setHomeTeam($homeTeam);
                $realMatch->setAwayTeam($awayTeam);
                $this->_realMatches[]=$realMatch;
            }
            if ($needDbUpdate && $realMatch->getHomeTeam()) {
                $this->em->persist($realMatch);
            }
        }

        if ($needDbUpdate) {
            $this->em->flush();
            $code = 200;
        }
        return $code;
    }

    /**
     * returns team by name. Creates the team if not found
     *
     * @param string                         $name   name of the team
     * @param \StatsBundle\Entity\RealLeague $league the league
     *
     * @return \StatsBundle\Entity\RealTeam $team
     */
    private function _getTeamByName($name, $league)
    {
        $realTeam = $this->em
            ->getRepository('StatsBundle:RealTeam')
            ->findOneBy(
                array(
                    'name' => $name
                )
            );
        if ($realTeam == null) {
            $this->_code = 200;
            //team doesn't exist yet
            $team = New RealTeam();
            $team->setName($name);
            $team->setRealLeague($league);
            $this->_teamsArray[$team->getName()] = $team;
            $this->em->persist($team);
            $this->em->flush();
        }
        return $realTeam;
    }

    /**
     * fetches existing teams for a championship and returns them in an array indexed on team name
     *
     * @param integer $championshipId the id of the championship
     *
     * @return array
     */
    private function _getTeamsArray($championshipId)
    {
        if (empty($this->_teamsArray)) {
            $realTeams = $this->em
                ->getRepository('StatsBundle:RealTeam')
                ->findBy(array('real_league' => $championshipId));
            foreach ($realTeams as $realTeam) {
                $this->_teamsArray[$realTeam->getName()] = $realTeam;
            }
        }
        return $this->_teamsArray;
    }

    /**
     * fetches existing teams for a championship and returns them in an array indexed on team ID
     *
     * @param integer $championshipId the id of the championship
     *
     * @return array
     */
    private function _getTeamsArrayById($championshipId)
    {
        if (empty($this->_teamsArrayById)) {
            if (empty($this->_teamsArray)) {
                $realTeams = $this->_getTeamsArray($championshipId);
                foreach ($realTeams as $realTeam) {
                    $this->_teamsArrayById[$realTeam->getId()] = $realTeam;
                }
            } else {
                foreach ($this->_teamsArray as $realTeam) {
                    $this->_teamsArrayById[$realTeam->getId()] = $realTeam;
                }
            }
        }
        return $this->_teamsArrayById;
    }

    /**
     * @param $league
     */
    private function _updateWeekData($league)
    {
        $this->_teamsArrayById = $this->_getTeamsArrayById($league->getId());
        /* @var RealMatch $realMatch */
        foreach ($this->_realMatches as $realMatch) {
            /* @var RealTeam $awayTeam*/
            $awayTeam = $this->_teamsArrayById[$realMatch->getAwayTeam()->getId()];
            /* @var RealTeam $homeTeam*/
            $homeTeam = $this->_teamsArrayById[$realMatch->getHomeTeam()->getId()];
            $weekId = $realMatch->getSeason().'-'.$realMatch->getWeek();
            $aggregateHome = false;
            $aggregateAway = false;
            $aggregatedWeekHome = json_decode($homeTeam->getAggregatedWeeks());
            $aggregatedWeekAway = json_decode($awayTeam->getAggregatedWeeks());
            if (!in_array($weekId, $aggregatedWeekHome)) {
                $aggregateHome = true;
                $aggregatedWeekHome[]=$weekId;
                $homeTeam->setAggregatedWeeks(json_encode($aggregatedWeekHome));
            }
            if (!in_array($weekId, $aggregatedWeekAway)) {
                $aggregateAway = true;
                $aggregatedWeekAway[]=$weekId;
                $awayTeam->setAggregatedWeeks(json_encode($aggregatedWeekAway));
            }
            if ($aggregateAway) {
                $awayTeam->setMatchesPlayed($awayTeam->getMatchesPlayed()+1);
                $awayTeam->setSeasonGoalsTaken($awayTeam->getSeasonGoalsTaken()+$realMatch->getHomeTeamScore());
                $awayTeam->setSeasonGoalsScored($awayTeam->getSeasonGoalsScored()+$realMatch->getAwayTeamScore());
                $awayTeam->setSeasonGoalsTakenAway($awayTeam->getSeasonGoalsTakenAway()+$realMatch->getHomeTeamScore());
                $awayTeam->setSeasonGoalsScoredAway($awayTeam->getSeasonGoalsScoredAway()+$realMatch->getAwayTeamScore());
            }
            if ($aggregateHome) {
                $homeTeam->setMatchesPlayed($homeTeam->getMatchesPlayed()+1);
                $homeTeam->setSeasonGoalsTaken($homeTeam->getSeasonGoalsTaken()+$realMatch->getAwayTeamScore());
                $homeTeam->setSeasonGoalsScored($homeTeam->getSeasonGoalsScored()+$realMatch->getHomeTeamScore());
                $homeTeam->setSeasonGoalsTakenHome($homeTeam->getSeasonGoalsTakenHome()+$realMatch->getAwayTeamScore());
                $homeTeam->setSeasonGoalsScoredHome($homeTeam->getSeasonGoalsScoredHome()+$realMatch->getHomeTeamScore());
            }
            if ($realMatch->getHomeTeamScore() < $realMatch->getAwayTeamScore()) {
                //home team lost
                if ($aggregateAway) {
                    $awayTeam->setSeasonVictories($awayTeam->getSeasonVictories() + 1);
                    $awayTeam->setSeasonVictoriesAway($awayTeam->getSeasonVictoriesAway() + 1);
                    $awayTeam->setPoints($awayTeam->getPoints() + RealLeague::POINTS_FOR_VICTORY);
                }
                if ($aggregateHome) {
                    $homeTeam->setSeasonDefeats($homeTeam->getSeasonDefeats() + 1);
                    $homeTeam->setSeasonDefeatsHome($homeTeam->getSeasonDefeatsHome() + 1);
                }
            } else if ($realMatch->getHomeTeamScore() > $realMatch->getAwayTeamScore()) {
                //home team won
                if ($aggregateHome) {
                    $homeTeam->setSeasonVictories($homeTeam->getSeasonVictories() + 1);
                    $homeTeam->setSeasonVictoriesHome($homeTeam->getSeasonVictoriesHome() + 1);
                    $homeTeam->setPoints($homeTeam->getPoints() + RealLeague::POINTS_FOR_VICTORY);
                }
                if ($aggregateAway) {
                    $awayTeam->setSeasonDefeats($awayTeam->getSeasonDefeats() + 1);
                    $awayTeam->setSeasonDefeatsAway($awayTeam->getSeasonDefeatsAway() + 1);
                }
            } else {
                //draw
                if ($aggregateHome) {
                    $homeTeam->setSeasonDraws($homeTeam->getSeasonDraws() + 1);
                    $homeTeam->setSeasonDrawsHome($homeTeam->getSeasonDrawsHome() + 1);
                    $homeTeam->setPoints($homeTeam->getPoints() + RealLeague::POINTS_FOR_DRAW);
                }
                if ($aggregateAway) {
                    $awayTeam->setSeasonDrawsAway($awayTeam->getSeasonDrawsAway() + 1);
                    $awayTeam->setSeasonDraws($awayTeam->getSeasonDraws()+1);
                    $awayTeam->setPoints($awayTeam->getPoints() + RealLeague::POINTS_FOR_DRAW);
                }
            }

            if ($aggregateHome) {
                $this->em->persist($homeTeam);
            }

            if ($aggregateAway) {
                $this->em->persist($awayTeam);
            }
        }
        $this->em->flush();
    }

    /**
     * @param $league
     * @return array
     */
    public function updateRankings($league)
    {
        $realTeams = $this->em ->getRepository('StatsBundle:RealTeam')
            ->findBy(array('real_league' => $league->getId()));

        $teamAmount = $league->getTeamAmount();

        usort($realTeams, function($a, $b) {

            /* @var RealTeam $a*/
            /* @var RealTeam $b*/
            if ($a->getPoints() < $b->getPoints()) return -1;
            if ($a->getPoints() > $b->getPoints()) return 1;
            if ($a->getGoalAverage() < $b->getGoalAverage()) return -1;
            if ($a->getGoalAverage() > $b->getGoalAverage()) return 1;
            if ($a->getSeasonGoalsScored() < $b->getSeasonGoalsScored()) return -1;
            if ($a->getSeasonGoalsScored() > $b->getSeasonGoalsScored()) return 1;

            return 0;
        });
        foreach ($realTeams as $id => $realTeam) {
            $realTeam->setRank($teamAmount - $id);
            $this->em->persist($realTeam);
        }

        $this->em->flush();
        return $realTeams;
    }
}