<?php

namespace StatsBundle\Entity;

/**
 * MpgMatch
 */
class MpgMatch
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $mpgLeagueId;

    /**
     * @var int
     */
    private $day;

    /**
     * @var \DateTime
     */
    private $date;

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
    private $homeScore;

    /**
     * @var int
     */
    private $awayScore;

    /**
     * @var \StatsBundle\Entity\MpgLeague
     */
    private $mpg_league;
    
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
     * Set mpgLeagueId
     *
     * @param integer $mpgLeagueId
     *
     * @return MpgMatch
     */
    public function setMpgLeagueId($mpgLeagueId)
    {
        $this->mpgLeagueId = $mpgLeagueId;

        return $this;
    }

    /**
     * Get mpgLeagueId
     *
     * @return int
     */
    public function getMpgLeagueId()
    {
        return $this->mpgLeagueId;
    }

    /**
     * Set day
     *
     * @param integer $day
     *
     * @return MpgMatch
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
     * @return MpgMatch
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
     * Set homeTeamId
     *
     * @param integer $homeTeamId
     *
     * @return MpgMatch
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
     * @return MpgMatch
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
     * Set homeScore
     *
     * @param integer $homeScore
     *
     * @return MpgMatch
     */
    public function setHomeScore($homeScore)
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    /**
     * Get homeScore
     *
     * @return int
     */
    public function getHomeScore()
    {
        return $this->homeScore;
    }

    /**
     * Set awayScore
     *
     * @param integer $awayScore
     *
     * @return MpgMatch
     */
    public function setAwayScore($awayScore)
    {
        $this->awayScore = $awayScore;

        return $this;
    }

    /**
     * Get awayScore
     *
     * @return int
     */
    public function getAwayScore()
    {
        return $this->awayScore;
    }
    /**
     * @var boolean
     */
    private $played = 0;


    /**
     * Set played
     *
     * @param boolean $played
     *
     * @return MpgMatch
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
     * Set mpgLeague
     *
     * @param \StatsBundle\Entity\MpgLeague $mpgLeague
     *
     * @return MpgMatch
     */
    public function setMpgLeague(\StatsBundle\Entity\MpgLeague $mpgLeague = null)
    {
        $this->mpg_league = $mpgLeague;

        return $this;
    }

    /**
     * Get mpgLeague
     *
     * @return \StatsBundle\Entity\MpgLeague
     */
    public function getMpgLeague()
    {
        return $this->mpg_league;
    }
    /**
     * @var integer
     */
    private $week;


    /**
     * Set week
     *
     * @param integer $week
     *
     * @return MpgMatch
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
     * @var integer
     */
    private $homeTeamRank;

    /**
     * @var integer
     */
    private $awayTeamRank;


    /**
     * Set homeTeamRank
     *
     * @param integer $homeTeamRank
     *
     * @return MpgMatch
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
     * @return MpgMatch
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
}
