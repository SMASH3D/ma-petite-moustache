<?php

namespace StatsBundle\Entity;

use StatsBundle\Entity\RealLeague;
/**
 * RealTeam
 */
class RealTeam
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $realLeagueId;

    /**
     * @var int
     */
    private $rank;

    /**
     * @var int
     */
    private $seasonGoalsTaken;

    /**
     * @var int
     */
    private $seasonGoalsScored;

    /**
     * @var int
     */
    private $seasonVictories;

    /**
     * @var int
     */
    private $seasonDraws;

    /**
     * @var int
     */
    private $seasonGoalsTakenHome;

    /**
     * @var int
     */
    private $seasonGoalsScoredHome;

    /**
     * @var int
     */
    private $seasonVictoriesHome;

    /**
     * @var int
     */
    private $seasonDrawsHome;

    /**
     * @var int
     */
    private $seasonDefeatsHome;

    /**
     * @var int
     */
    private $seasonGoalsTakenAway;

    /**
     * @var int
     */
    private $seasonGoalsScoredAway;

    /**
     * @var int
     */
    private $seasonVictoriesAway;

    /**
     * @var int
     */
    private $seasonDrawsAway;

    /**
     * @var int
     */
    private $seasonDefeatsAway;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_matches;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $synonyms;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->real_matches = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return RealTeam
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set realLeagueId
     *
     * @param integer $realLeagueId
     *
     * @return RealTeam
     */
    public function setRealLeagueId($realLeagueId)
    {
        $this->realLeagueId = $realLeagueId;

        return $this;
    }

    /**
     * Get realLeagueId
     *
     * @return int
     */
    public function getRealLeagueId()
    {
        return $this->realLeagueId;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     *
     * @return RealTeam
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set seasonGoalsTaken
     *
     * @param integer $seasonGoalsTaken
     *
     * @return RealTeam
     */
    public function setSeasonGoalsTaken($seasonGoalsTaken)
    {
        $this->seasonGoalsTaken = $seasonGoalsTaken;

        return $this;
    }

    /**
     * Get seasonGoalsTaken
     *
     * @return int
     */
    public function getSeasonGoalsTaken()
    {
        return $this->seasonGoalsTaken;
    }

    /**
     * Set seasonGoalsScored
     *
     * @param integer $seasonGoalsScored
     *
     * @return RealTeam
     */
    public function setSeasonGoalsScored($seasonGoalsScored)
    {
        $this->seasonGoalsScored = $seasonGoalsScored;

        return $this;
    }

    /**
     * Get seasonGoalsScored
     *
     * @return int
     */
    public function getSeasonGoalsScored()
    {
        return $this->seasonGoalsScored;
    }

    /**
     * Set seasonVictories
     *
     * @param integer $seasonVictories
     *
     * @return RealTeam
     */
    public function setSeasonVictories($seasonVictories)
    {
        $this->seasonVictories = $seasonVictories;

        return $this;
    }

    /**
     * Get seasonVictories
     *
     * @return int
     */
    public function getSeasonVictories()
    {
        return $this->seasonVictories;
    }

    /**
     * Set seasonDraws
     *
     * @param integer $seasonDraws
     *
     * @return RealTeam
     */
    public function setSeasonDraws($seasonDraws)
    {
        $this->seasonDraws = $seasonDraws;

        return $this;
    }

    /**
     * Get seasonDraws
     *
     * @return int
     */
    public function getSeasonDraws()
    {
        return $this->seasonDraws;
    }

    /**
     * Set seasonGoalsTakenHome
     *
     * @param integer $seasonGoalsTakenHome
     *
     * @return RealTeam
     */
    public function setSeasonGoalsTakenHome($seasonGoalsTakenHome)
    {
        $this->seasonGoalsTakenHome = $seasonGoalsTakenHome;

        return $this;
    }

    /**
     * Get seasonGoalsTakenHome
     *
     * @return int
     */
    public function getSeasonGoalsTakenHome()
    {
        return $this->seasonGoalsTakenHome;
    }

    /**
     * Set seasonGoalsScoredHome
     *
     * @param integer $seasonGoalsScoredHome
     *
     * @return RealTeam
     */
    public function setSeasonGoalsScoredHome($seasonGoalsScoredHome)
    {
        $this->seasonGoalsScoredHome = $seasonGoalsScoredHome;

        return $this;
    }

    /**
     * Get seasonGoalsScoredHome
     *
     * @return int
     */
    public function getSeasonGoalsScoredHome()
    {
        return $this->seasonGoalsScoredHome;
    }

    /**
     * Set seasonVictoriesHome
     *
     * @param integer $seasonVictoriesHome
     *
     * @return RealTeam
     */
    public function setSeasonVictoriesHome($seasonVictoriesHome)
    {
        $this->seasonVictoriesHome = $seasonVictoriesHome;

        return $this;
    }

    /**
     * Get seasonVictoriesHome
     *
     * @return int
     */
    public function getSeasonVictoriesHome()
    {
        return $this->seasonVictoriesHome;
    }

    /**
     * Set seasonDrawsHome
     *
     * @param integer $seasonDrawsHome
     *
     * @return RealTeam
     */
    public function setSeasonDrawsHome($seasonDrawsHome)
    {
        $this->seasonDrawsHome = $seasonDrawsHome;

        return $this;
    }

    /**
     * Get seasonDrawsHome
     *
     * @return int
     */
    public function getSeasonDrawsHome()
    {
        return $this->seasonDrawsHome;
    }

    /**
     * Set seasonDefeatsHome
     *
     * @param integer $seasonDefeatsHome
     *
     * @return RealTeam
     */
    public function setSeasonDefeatsHome($seasonDefeatsHome)
    {
        $this->seasonDefeatsHome = $seasonDefeatsHome;

        return $this;
    }

    /**
     * Get seasonDefeatsHome
     *
     * @return int
     */
    public function getSeasonDefeatsHome()
    {
        return $this->seasonDefeatsHome;
    }

    /**
     * Set seasonGoalsTakenAway
     *
     * @param integer $seasonGoalsTakenAway
     *
     * @return RealTeam
     */
    public function setSeasonGoalsTakenAway($seasonGoalsTakenAway)
    {
        $this->seasonGoalsTakenAway = $seasonGoalsTakenAway;

        return $this;
    }

    /**
     * Get seasonGoalsTakenAway
     *
     * @return int
     */
    public function getSeasonGoalsTakenAway()
    {
        return $this->seasonGoalsTakenAway;
    }

    /**
     * Set seasonGoalsScoredAway
     *
     * @param integer $seasonGoalsScoredAway
     *
     * @return RealTeam
     */
    public function setSeasonGoalsScoredAway($seasonGoalsScoredAway)
    {
        $this->seasonGoalsScoredAway = $seasonGoalsScoredAway;

        return $this;
    }

    /**
     * Get seasonGoalsScoredAway
     *
     * @return int
     */
    public function getSeasonGoalsScoredAway()
    {
        return $this->seasonGoalsScoredAway;
    }

    /**
     * Set seasonVictoriesAway
     *
     * @param integer $seasonVictoriesAway
     *
     * @return RealTeam
     */
    public function setSeasonVictoriesAway($seasonVictoriesAway)
    {
        $this->seasonVictoriesAway = $seasonVictoriesAway;

        return $this;
    }

    /**
     * Get seasonVictoriesAway
     *
     * @return int
     */
    public function getSeasonVictoriesAway()
    {
        return $this->seasonVictoriesAway;
    }

    /**
     * Set seasonDrawsAway
     *
     * @param integer $seasonDrawsAway
     *
     * @return RealTeam
     */
    public function setSeasonDrawsAway($seasonDrawsAway)
    {
        $this->seasonDrawsAway = $seasonDrawsAway;

        return $this;
    }

    /**
     * Get seasonDrawsAway
     *
     * @return int
     */
    public function getSeasonDrawsAway()
    {
        return $this->seasonDrawsAway;
    }

    /**
     * Set seasonDefeatsAway
     *
     * @param integer $seasonDefeatsAway
     *
     * @return RealTeam
     */
    public function setSeasonDefeatsAway($seasonDefeatsAway)
    {
        $this->seasonDefeatsAway = $seasonDefeatsAway;

        return $this;
    }

    /**
     * Get seasonDefeatsAway
     *
     * @return int
     */
    public function getSeasonDefeatsAway()
    {
        return $this->seasonDefeatsAway;
    }
    /**
     * @var integer
     */
    private $matchesPlayed;

    /**
     * @var integer
     */
    private $seasonDefeats;


    /**
     * Set matchesPlayed
     *
     * @param integer $matchesPlayed
     *
     * @return RealTeam
     */
    public function setMatchesPlayed($matchesPlayed)
    {
        $this->matchesPlayed = $matchesPlayed;

        return $this;
    }

    /**
     * Get matchesPlayed
     *
     * @return integer
     */
    public function getMatchesPlayed()
    {
        return $this->matchesPlayed;
    }

    /**
     * Set seasonDefeats
     *
     * @param integer $seasonDefeats
     *
     * @return RealTeam
     */
    public function setSeasonDefeats($seasonDefeats)
    {
        $this->seasonDefeats = $seasonDefeats;

        return $this;
    }

    /**
     * Get seasonDefeats
     *
     * @return integer
     */
    public function getSeasonDefeats()
    {
        return $this->seasonDefeats;
    }
    /**
     * @var \StatsBundle\Entity\RealLeague
     */
    private $real_league;


    /**
     * Set realLeague
     *
     * @param \StatsBundle\Entity\RealLeague $realLeague
     *
     * @return RealTeam
     */
    public function setRealLeague(\StatsBundle\Entity\RealLeague $realLeague = null)
    {
        $this->real_league = $realLeague;

        return $this;
    }

    /**
     * Get realLeague
     *
     * @return \StatsBundle\Entity\RealLeague
     */
    public function getRealLeague()
    {
        return $this->real_league;
    }

    /**
     * Add realMatch
     *
     * @param \StatsBundle\Entity\RealMatch $realMatch
     *
     * @return RealTeam
     */
    public function addRealMatch(\StatsBundle\Entity\RealMatch $realMatch)
    {
        $this->real_matches[] = $realMatch;

        return $this;
    }

    /**
     * Remove realMatch
     *
     * @param \StatsBundle\Entity\RealMatch $realMatch
     */
    public function removeRealMatch(\StatsBundle\Entity\RealMatch $realMatch)
    {
        $this->real_matches->removeElement($realMatch);
    }

    /**
     * Get realMatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealMatches()
    {
        return $this->real_matches;
    }
    /**
     * @var integer
     */
    private $mpg_id;


    /**
     * Set mpgId
     *
     * @param integer $mpgId
     *
     * @return RealTeam
     */
    public function setMpgId($mpgId)
    {
        $this->mpg_id = $mpgId;

        return $this;
    }

    /**
     * Get mpgId
     *
     * @return integer
     */
    public function getMpgId()
    {
        return $this->mpg_id;
    }
    /**
     * @var string
     */
    private $aggregated_weeks;


    /**
     * Set aggregatedWeeks
     *
     * @param string $aggregatedWeeks
     *
     * @return RealTeam
     */
    public function setAggregatedWeeks($aggregatedWeeks)
    {
        $this->aggregated_weeks = $aggregatedWeeks;

        return $this;
    }

    /**
     * Get aggregatedWeeks
     *
     * @return string
     */
    public function getAggregatedWeeks()
    {
        return $this->aggregated_weeks;
    }
    /**
     * @var integer
     */
    private $points;


    /**
     * Set points
     *
     * @param integer $points
     *
     * @return RealTeam
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        if (is_null($this->points)) {
            $this->points = $this->getSeasonDraws() * RealLeague::POINTS_FOR_DRAW
                + $this->getSeasonVictories() * RealLeague::POINTS_FOR_VICTORY;
        }
        
        return $this->points;
    }

    /**
     * Get Goal Average
     *
     * @return integer
     */
    public function getGoalAverage()
    {
        $this->goalAverage = $this->getSeasonGoalsScored() - $this->getSeasonGoalsTaken();
        return $this->goalAverage;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $players;


    /**
     * Add player
     *
     * @param \StatsBundle\Entity\Player $player
     *
     * @return RealTeam
     */
    public function addPlayer(\StatsBundle\Entity\Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param \StatsBundle\Entity\Player $player
     */
    public function removePlayer(\StatsBundle\Entity\Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add synonym
     *
     * @param \StatsBundle\Entity\Synonym $synonym
     *
     * @return RealTeam
     */
    public function addSynonym(\StatsBundle\Entity\Synonym $synonym)
    {
        $this->synonyms[] = $synonym;

        return $this;
    }

    /**
     * Remove synonym
     *
     * @param \StatsBundle\Entity\Synonym $synonym
     */
    public function removeSynonym(\StatsBundle\Entity\Synonym $synonym)
    {
        $this->synonyms->removeElement($synonym);
    }

    /**
     * Get synonyms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSynonyms()
    {
        return $this->synonyms;
    }
}
