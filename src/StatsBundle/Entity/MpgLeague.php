<?php

namespace StatsBundle\Entity;

/**
 * MpgLeague
 */
class MpgLeague
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
     * @var string
     */
    private $country;

    /**
     * @var int
     */
    private $teamAmount;

    /**
     * @var int
     */
    private $upcomingDay;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $hash;


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
     * @return MpgLeague
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
     * Set country
     *
     * @param string $country
     *
     * @return MpgLeague
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
     * Set teamAmount
     *
     * @param integer $teamAmount
     *
     * @return MpgLeague
     */
    public function setTeamAmount($teamAmount)
    {
        $this->teamAmount = $teamAmount;

        return $this;
    }

    /**
     * Get teamAmount
     *
     * @return int
     */
    public function getTeamAmount()
    {
        return $this->teamAmount;
    }

    /**
     * Set upcomingDay
     *
     * @param integer $upcomingDay
     *
     * @return MpgLeague
     */
    public function setUpcomingDay($upcomingDay)
    {
        $this->upcomingDay = $upcomingDay;

        return $this;
    }

    /**
     * Get upcomingDay
     *
     * @return int
     */
    public function getUpcomingDay()
    {
        return $this->upcomingDay;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MpgLeague
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return MpgLeague
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return MpgLeague
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }
    /**
     * @var integer
     */
    private $dayStart;

    /**
     * @var integer
     */
    private $dayEnd;

    /**
     * @var integer
     */
    private $realLeagueId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $mpg_teams;

    /**
     * @var \StatsBundle\Entity\RealLeague
     */
    private $real_league;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mpg_teams = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set dayStart
     *
     * @param integer $dayStart
     *
     * @return MpgLeague
     */
    public function setDayStart($dayStart)
    {
        $this->dayStart = $dayStart;

        return $this;
    }

    /**
     * Get dayStart
     *
     * @return integer
     */
    public function getDayStart()
    {
        return $this->dayStart;
    }

    /**
     * Set dayEnd
     *
     * @param integer $dayEnd
     *
     * @return MpgLeague
     */
    public function setDayEnd($dayEnd)
    {
        $this->dayEnd = $dayEnd;

        return $this;
    }

    /**
     * Get dayEnd
     *
     * @return integer
     */
    public function getDayEnd()
    {
        return $this->dayEnd;
    }

    /**
     * Set realLeagueId
     *
     * @param integer $realLeagueId
     *
     * @return MpgLeague
     */
    public function setRealLeagueId($realLeagueId)
    {
        $this->realLeagueId = $realLeagueId;

        return $this;
    }

    /**
     * Get realLeagueId
     *
     * @return integer
     */
    public function getRealLeagueId()
    {
        return $this->realLeagueId;
    }

    /**
     * Add mpgTeam
     *
     * @param \StatsBundle\Entity\MpgTeam $mpgTeam
     *
     * @return MpgLeague
     */
    public function addMpgTeam(\StatsBundle\Entity\MpgTeam $mpgTeam)
    {
        $this->mpg_teams[] = $mpgTeam;

        return $this;
    }

    /**
     * Remove mpgTeam
     *
     * @param \StatsBundle\Entity\MpgTeam $mpgTeam
     */
    public function removeMpgTeam(\StatsBundle\Entity\MpgTeam $mpgTeam)
    {
        $this->mpg_teams->removeElement($mpgTeam);
    }

    /**
     * Get mpgTeams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMpgTeams()
    {
        return $this->mpg_teams;
    }

    /**
     * Set realLeague
     *
     * @param \StatsBundle\Entity\RealLeague $realLeague
     *
     * @return MpgLeague
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
     * @var integer
     */
    private $upcomingWeek;

    /**
     * @var integer
     */
    private $weekStart;

    /**
     * @var integer
     */
    private $weekEnd;


    /**
     * Set upcomingWeek
     *
     * @param integer $upcomingWeek
     *
     * @return MpgLeague
     */
    public function setUpcomingWeek($upcomingWeek)
    {
        $this->upcomingWeek = $upcomingWeek;

        return $this;
    }

    /**
     * Get upcomingWeek
     *
     * @return integer
     */
    public function getUpcomingWeek()
    {
        return $this->upcomingWeek;
    }

    /**
     * Set weekStart
     *
     * @param integer $weekStart
     *
     * @return MpgLeague
     */
    public function setWeekStart($weekStart)
    {
        $this->weekStart = $weekStart;

        return $this;
    }

    /**
     * Get weekStart
     *
     * @return integer
     */
    public function getWeekStart()
    {
        return $this->weekStart;
    }

    /**
     * Set weekEnd
     *
     * @param integer $weekEnd
     *
     * @return MpgLeague
     */
    public function setWeekEnd($weekEnd)
    {
        $this->weekEnd = $weekEnd;

        return $this;
    }

    /**
     * Get weekEnd
     *
     * @return integer
     */
    public function getWeekEnd()
    {
        return $this->weekEnd;
    }
}
