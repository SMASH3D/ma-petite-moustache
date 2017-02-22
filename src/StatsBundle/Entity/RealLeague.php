<?php

namespace StatsBundle\Entity;

/**
 * RealLeague
 */
class RealLeague
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
     * @var int
     */
    private $season;


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
     * @return RealLeague
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
     * @return RealLeague
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
     * @return RealLeague
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
     * @return RealLeague
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
     * Set season
     *
     * @param integer $season
     *
     * @return RealLeague
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }
    /**
     * @var integer
     */
    private $upcomingWeek;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_teams;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->real_teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set upcomingWeek
     *
     * @param integer $upcomingWeek
     *
     * @return RealLeague
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
     * Add realTeam
     *
     * @param \StatsBundle\Entity\RealTeam $realTeam
     *
     * @return RealLeague
     */
    public function addRealTeam(\StatsBundle\Entity\RealTeam $realTeam)
    {
        $this->real_teams[] = $realTeam;

        return $this;
    }

    /**
     * Remove realTeam
     *
     * @param \StatsBundle\Entity\RealTeam $realTeam
     */
    public function removeRealTeam(\StatsBundle\Entity\RealTeam $realTeam)
    {
        $this->real_teams->removeElement($realTeam);
    }

    /**
     * Get realTeams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealTeams()
    {
        return $this->real_teams;
    }
    /**
     * @var integer
     */
    private $mpgId;


    /**
     * Set mpgId
     *
     * @param integer $mpgId
     *
     * @return RealLeague
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
}
