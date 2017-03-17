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
    const DEFAULT_TEAM_AMOUNT = 20;

    /**
     * Dirty constants :D
     */
    const FRENCH_CHAMPIONSHIP_ID = 1;
    const BRITISH_CHAMPIONSHIP_ID = 2;
    
    const POINTS_FOR_VICTORY = 3;
    const POINTS_FOR_DRAW = 1;
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
    private $season;

    /**
     * @var integer
     */
    private $upcomingWeek;

    /**
     * @var integer
     */
    private $mpgId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_teams;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_matches;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct($mpgId, $name)
    {
        $this->setMpgId($mpgId);
        $this->setSeason(date('Y'));
        $this->setName($name);
        $this->setTeamAmount(self::DEFAULT_TEAM_AMOUNT);
        $this->setCountryCodeFromChampionshipId($mpgId);
        $this->real_teams = new \Doctrine\Common\Collections\ArrayCollection();
        $this->real_matches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * DIRRRRTY FUNCTION to set the proper country code from the championship ID
     *
     * @param int $id championship ID
     *
     * @return RealLeague
     */
    public function setCountryCodeFromChampionshipId($id)
    {
        $this->country = 'FR';
        if ($id == self::BRITISH_CHAMPIONSHIP_ID) {
            $this->country = 'GB';
        }
        return $this;
    }

    /**
     * Add realMatch
     *
     * @param \StatsBundle\Entity\RealMatch $realMatch
     *
     * @return RealLeague
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
     * Add Player
     *
     * @param \StatsBundle\Entity\RealMatch $player
     *
     * @return RealLeague
     */
    public function addPlayer(\StatsBundle\Entity\Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove Player
     *
     * @param \StatsBundle\Entity\RealMatch $player
     */
    public function removePlayer(\StatsBundle\Entity\Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get Players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
