<?php

namespace StatsBundle\Entity;

/**
 * RealMatch
 */
class RealMatch
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $realLeagueId;

    /**
     * @var int
     */
    private $homeTeamId;

    /**
     * @var int
     */
    private $awayTeamId;

    /**
     * @var int
     */
    private $homeTeamScore;

    /**
     * @var int
     */
    private $awayTeamScore;

    /**
     * @var int
     */
    private $day;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \StatsBundle\Entity\RealLeague
     */
    private $real_league;
    /**
     * @var boolean
     */
    private $played = 0;

    /**
     * @var integer
     */
    private $week;

    /**
     * @var integer
     */
    private $homeTeamRank;

    /**
     * @var integer
     */
    private $awayTeamRank;
    
    /**
     * @var integer
     */
    private $season;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $player_real_matches;
    
    /**
     * @var integer
     */
    private $mpgId;

    /**
     * @var \StatsBundle\Entity\RealTeam
     */
    private $home_team;

    /**
     * @var \StatsBundle\Entity\RealTeam
     */
    private $away_team;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->player_real_matches = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set realLeagueId
     *
     * @param integer $realLeagueId
     *
     * @return RealMatch
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
     * Set homeTeamId
     *
     * @param integer $homeTeamId
     *
     * @return RealMatch
     */
    public function setHomeTeamId($homeTeamId)
    {
        $this->homeTeamId = $homeTeamId;

        return $this;
    }

    /**
     * Get homeTeamId
     *
     * @return int
     */
    public function getHomeTeamId()
    {
        return $this->homeTeamId;
    }

    /**
     * Set awayTeamId
     *
     * @param integer $awayTeamId
     *
     * @return RealMatch
     */
    public function setAwayTeamId($awayTeamId)
    {
        $this->awayTeamId = $awayTeamId;

        return $this;
    }

    /**
     * Get awayTeamId
     *
     * @return int
     */
    public function getAwayTeamId()
    {
        return $this->awayTeamId;
    }

    /**
     * Set homeTeamScore
     *
     * @param integer $homeTeamScore
     *
     * @return RealMatch
     */
    public function setHomeTeamScore($homeTeamScore)
    {
        $this->homeTeamScore = $homeTeamScore;

        return $this;
    }

    /**
     * Get homeTeamScore
     *
     * @return int
     */
    public function getHomeTeamScore()
    {
        return $this->homeTeamScore;
    }

    /**
     * Set awayTeamScore
     *
     * @param integer $awayTeamScore
     *
     * @return RealMatch
     */
    public function setAwayTeamScore($awayTeamScore)
    {
        $this->awayTeamScore = $awayTeamScore;

        return $this;
    }

    /**
     * Get awayTeamScore
     *
     * @return int
     */
    public function getAwayTeamScore()
    {
        return $this->awayTeamScore;
    }

    /**
     * Set day
     *
     * @param integer $day
     *
     * @return RealMatch
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return RealMatch
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set realLeague
     *
     * @param \StatsBundle\Entity\RealLeague $realLeague
     *
     * @return RealMatch
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
     * Set played
     *
     * @param boolean $played
     *
     * @return RealMatch
     */
    public function setPlayed($played)
    {
        $this->played = $played;

        return $this;
    }

    /**
     * Get played
     *
     * @return boolean
     */
    public function getPlayed()
    {
        return $this->played;
    }

    /**
     * Set week
     *
     * @param integer $week
     *
     * @return RealMatch
     */
    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return integer
     */
    public function getWeek()
    {
        return $this->week;
    }
    /**
     * Set homeTeamRank
     *
     * @param integer $homeTeamRank
     *
     * @return RealMatch
     */
    public function setHomeTeamRank($homeTeamRank)
    {
        $this->homeTeamRank = $homeTeamRank;

        return $this;
    }

    /**
     * Get homeTeamRank
     *
     * @return integer
     */
    public function getHomeTeamRank()
    {
        return $this->homeTeamRank;
    }

    /**
     * Set awayTeamRank
     *
     * @param integer $awayTeamRank
     *
     * @return RealMatch
     */
    public function setAwayTeamRank($awayTeamRank)
    {
        $this->awayTeamRank = $awayTeamRank;

        return $this;
    }

    /**
     * Get awayTeamRank
     *
     * @return integer
     */
    public function getAwayTeamRank()
    {
        return $this->awayTeamRank;
    }

    /**
     * Add playerRealMatch
     *
     * @param \StatsBundle\Entity\PlayerRealMatch $playerRealMatch
     *
     * @return RealMatch
     */
    public function addPlayerRealMatch(\StatsBundle\Entity\PlayerRealMatch $playerRealMatch)
    {
        $this->player_real_matches[] = $playerRealMatch;

        return $this;
    }

    /**
     * Remove playerRealMatch
     *
     * @param \StatsBundle\Entity\PlayerRealMatch $playerRealMatch
     */
    public function removePlayerRealMatch(\StatsBundle\Entity\PlayerRealMatch $playerRealMatch)
    {
        $this->player_real_matches->removeElement($playerRealMatch);
    }

    /**
     * Get playerRealMatches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayerRealMatches()
    {
        return $this->player_real_matches;
    }

    /**
     * Set mpgId
     *
     * @param integer $mpgId
     *
     * @return RealMatch
     */
    public function setMpgId($mpgId)
    {
        $this->mpgId = $mpgId;

        return $this;
    }

    /**
     * Get mpgId
     *
     * @return integer
     */
    public function getMpgId()
    {
        return $this->mpgId;
    }

    /**
     * Set season
     *
     * @param integer $season
     *
     * @return RealMatch
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return integer
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set homeTeam
     *
     * @param \StatsBundle\Entity\RealTeam $homeTeam
     *
     * @return RealMatch
     */
    public function setHomeTeam(\StatsBundle\Entity\RealTeam $homeTeam = null)
    {
        $this->home_team = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return \StatsBundle\Entity\RealTeam
     */
    public function getHomeTeam()
    {
        return $this->home_team;
    }

    /**
     * Set awayTeam
     *
     * @param \StatsBundle\Entity\RealTeam $awayTeam
     *
     * @return RealMatch
     */
    public function setAwayTeam(\StatsBundle\Entity\RealTeam $awayTeam = null)
    {
        $this->away_team = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return \StatsBundle\Entity\RealTeam
     */
    public function getAwayTeam()
    {
        return $this->away_team;
    }
    /**
     * @var string
     */
    private $dataHash;


    /**
     * Set dataHash
     *
     * @param string $dataHash
     *
     * @return RealMatch
     */
    public function setDataHash($dataHash)
    {
        $this->dataHash = $dataHash;

        return $this;
    }

    /**
     * Get dataHash
     *
     * @return string
     */
    public function getDataHash()
    {
        return $this->dataHash;
    }
}
