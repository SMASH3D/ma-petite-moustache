<?php

namespace StatsBundle\Entity;

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
     * @var string
     */
    private $country;

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
     * Set country
     *
     * @param string $country
     *
     * @return RealTeam
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_matches;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->real_matches = new \Doctrine\Common\Collections\ArrayCollection();
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
}
