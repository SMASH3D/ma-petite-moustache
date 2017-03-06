<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use StatsBundle\Entity\RealMatch;
use StatsBundle\Entity\RealLeague;
use StatsBundle\Entity\Player;

/**
 * Aggregator
 */
class Aggregator
{
    private $_teamsArray = array();
    private $_realMatches = array();
    private $_teamsArrayById = array();
    private $_weekSummary = array();

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
     * @param array $weekData
     * 
     * @return integer $code the return code
     */
    public function aggregateWeekSummary($weekData) {
        $this->_weekSummary = $weekData;
        $league = $this->_getLeague();
        $code = $this->_setWeekRealGames($league);
        //if ($code == 200) {
            $this->_updateWeekData($league);
            $this->updateRankings($league);
        //}
        return $code;
    }

    /**
     * Gets an instance of the current league, creates it if it doesn't exist
     *
     * @return object|RealLeague
     */
    private function _getLeague()
    {
        $championshipId = (isset($this->_weekSummary['championshipID']) ? $this->_weekSummary['championshipID'] : null);
        $name = (isset($this->_weekSummary['championship']) ? $this->_weekSummary['championship'] : null);

        $league = $this->em
            ->getRepository('StatsBundle:RealLeague')
            ->find($championshipId);
        $needDbUpdate = false;

        if (is_null($league)) {
            $needDbUpdate = true;
            $league = New RealLeague($championshipId, $name);
        }
        if ($league->getUpcomingWeek() < (int) $this->_weekSummary['week']) {
            $needDbUpdate = true;
            $league->setUpcomingWeek((int) $this->_weekSummary['week']+1);
        }

        if ($needDbUpdate) {
            $em = $this->em;
            $em->persist($league);
            $em->flush();
        }

        return $league;
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
            /*foreach ($games[$realMatch->getMpgId()] as $matchAttribute => $value) {
                if ($realMatch->getData($matchAttribute) != $value) {
                    //need to update this match in db
                    //$needDbUpdate = true;
                    $attr = $realMatch->getData($matchAttribute);
                }
            }*/
            //removing the updated game from the pool of games to treat
            unset($games[$realMatch->getMpgId()]);
            $this->_realMatches[]=$realMatch;
            if ($needDbUpdate) {
                $this->em->persist($realMatch);
                $this->em->flush();
            }
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
                $realMatch->setHomeTeamId($homeTeam->getId());
                $realMatch->setAwayTeamId($awayTeam->getId());
                $this->_realMatches[]=$realMatch;
            }
            if ($needDbUpdate) {
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
        $id = null;
        if (in_array($name, array_keys($this->_getTeamsArray($league->getId())))) {
            $team = $this->_teamsArray[$name];
        } else {
            //team doesn't exist yet
            $team = New RealTeam();
            $team->setName($name);
            $team->setRealLeague($league);
            $this->_teamsArray[$team->getName()] = $team;
            $this->em->persist($team);
            $this->em->flush();
        }
        return $team;
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
            $awayTeam = $this->_teamsArrayById[$realMatch->getAwayTeamId()];
            /* @var RealTeam $homeTeam*/
            $homeTeam = $this->_teamsArrayById[$realMatch->getHomeTeamId()];
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