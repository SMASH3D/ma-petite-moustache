<?php

namespace StatsBundle\Entity;

/**
 * Player
 */
class Player
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
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $realTeamId;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var int
     */
    private $seasonHasStarted;

    /**
     * @var int
     */
    private $allTimeHasStarted;

    /**
     * @var int
     */
    private $seasonHasEntered;

    /**
     * @var int
     */
    private $allTimeHasEntered;
    
    /**
     * @var float
     */
    private $averageGrade;

    /**
     * @var \DateTime
     */
    private $injuredUntil;

    /**
     * @var \DateTime
     */
    private $suspendedUntil;

    /**
     * @var int
     */
    private $seasonGoals;

    /**
     * @var int
     */
    private $allTimeYellowCards;

    /**
     * @var int
     */
    private $allTimeRedCards;

    /**
     * @var int
     */
    private $allTimeGoals;

    /**
     * @var int
     */
    private $yearOfBirth;

    /**
     * @var int
     */
    private $seasonOwnGoals;

    /**
     * @var int
     */
    private $allTimeOwnGoals;

    /**
     * @var string
     */
    private $nationality;

    /**
     * @var float
     */
    private $averageGradeAllTime;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $synonyms;

    /**
     * @var float
     */
    private $seasonAverageGrade;

    /**
     * @var float
     */
    private $last5AverageGrade;

    /**
     * @var float
     */
    private $last10AverageGrade;

    /**
     * @var float
     */
    private $last20AverageGrade;

    /**
     * @var string
     */
    private $preservedUntil;

    /**
     * @var string
     */
    private $unavailableUntil;

    /**
     * @var string
     */
    private $lastMatches;

    /**
     * @var integer
     */
    private $seasonYellowCards = 0;

    /**
     * @var integer
     */
    private $seasonRedCards = 0;


    /**
     * @var integer
     */
    private $seasonInjuries = 0;

    /**
     * @var integer
     */
    private $allTimeInjuries = 0;

    /**
     * @var integer
     */
    private $seasonSuspensions = 0;

    /**
     * @var integer
     */
    private $allTimeSuspensions = 0;

    /**
     * @var integer
     */
    private $seasonBenchs = 0;

    /**
     * @var integer
     */
    private $allTimeBenchs = 0;

    /**
     * @var string
     */
    private $benchedUntil;

    /**
     * @var integer
     */
    private $seasonExclusions = 0;

    /**
     * @var integer
     */
    private $allTimeExclusions = 0;

    /**
     * @var string
     */
    private $seasonUnavailabilities = 0;

    /**
     * @var string
     */
    private $allTimeUnavailabilities = 0;

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
     * @return Player
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
     * Set role
     *
     * @param string $role
     *
     * @return Player
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set realTeamId
     *
     * @param integer $realTeamId
     *
     * @return Player
     */
    public function setRealTeamId($realTeamId)
    {
        $this->realTeamId = $realTeamId;

        return $this;
    }

    /**
     * Get realTeamId
     *
     * @return int
     */
    public function getRealTeamId()
    {
        return $this->realTeamId;
    }

    /**
     * Set averageGrade
     *
     * @param float $averageGrade
     *
     * @return Player
     */
    public function setAverageGrade($averageGrade)
    {
        $this->averageGrade = $averageGrade;

        return $this;
    }

    /**
     * Get averageGrade
     *
     * @return float
     */
    public function getAverageGrade()
    {
        return $this->averageGrade;
    }

    /**
     * Set injuredUntil
     *
     * @param \String $injuredUntil
     *
     * @return Player
     */
    public function setInjuredUntil($injuredUntil)
    {
        $this->injuredUntil = $injuredUntil;

        return $this;
    }

    /**
     * Get injuredUntil
     *
     * @return \String
     */
    public function getInjuredUntil()
    {
        return $this->injuredUntil;
    }

    /**
     * Set suspendedUntil
     *
     * @param \String $suspendedUntil
     *
     * @return Player
     */
    public function setSuspendedUntil($suspendedUntil)
    {
        $this->suspendedUntil = $suspendedUntil;

        return $this;
    }

    /**
     * Get suspendedUntil
     *
     * @return \String
     */
    public function getSuspendedUntil()
    {
        return $this->suspendedUntil;
    }

    /**
     * Set seasonGoals
     *
     * @param integer $seasonGoals
     *
     * @return Player
     */
    public function setSeasonGoals($seasonGoals)
    {
        $this->seasonGoals = $seasonGoals;

        return $this;
    }

    /**
     * Get seasonGoals
     *
     * @return int
     */
    public function getSeasonGoals()
    {
        return $this->seasonGoals;
    }

    /**
     * Set exclusions
     *
     * @param string $exclusions
     *
     * @return Player
     */
    public function setExclusions($exclusions)
    {
        $this->exclusions = $exclusions;

        return $this;
    }

    /**
     * Get exclusions
     *
     * @return string
     */
    public function getExclusions()
    {
        return $this->exclusions;
    }

    /**
     * Set allTimeYellowCards
     *
     * @param integer $allTimeYellowCards
     *
     * @return Player
     */
    public function setAllTimeYellowCards($allTimeYellowCards)
    {
        $this->allTimeYellowCards = $allTimeYellowCards;

        return $this;
    }

    /**
     * Get allTimeYellowCards
     *
     * @return int
     */
    public function getAllTimeYellowCards()
    {
        return $this->allTimeYellowCards;
    }

    /**
     * Set allTimeRedCards
     *
     * @param integer $allTimeRedCards
     *
     * @return Player
     */
    public function setAllTimeRedCards($allTimeRedCards)
    {
        $this->allTimeRedCards = $allTimeRedCards;

        return $this;
    }

    /**
     * Get allTimeRedCards
     *
     * @return int
     */
    public function getAllTimeRedCards()
    {
        return $this->allTimeRedCards;
    }

    /**
     * Set allTimeGoals
     *
     * @param integer $allTimeGoals
     *
     * @return Player
     */
    public function setAllTimeGoals($allTimeGoals)
    {
        $this->allTimeGoals = $allTimeGoals;

        return $this;
    }

    /**
     * Get allTimeGoals
     *
     * @return int
     */
    public function getAllTimeGoals()
    {
        return $this->allTimeGoals;
    }

    /**
     * Set yearOfBirth
     *
     * @param integer $yearOfBirth
     *
     * @return Player
     */
    public function setYearOfBirth($yearOfBirth)
    {
        $this->yearOfBirth = $yearOfBirth;

        return $this;
    }

    /**
     * Get yearOfBirth
     *
     * @return int
     */
    public function getYearOfBirth()
    {
        return $this->yearOfBirth;
    }

    /**
     * Set seasonOwnGoals
     *
     * @param integer $seasonOwnGoals
     *
     * @return Player
     */
    public function setSeasonOwnGoals($seasonOwnGoals)
    {
        $this->seasonOwnGoals = $seasonOwnGoals;

        return $this;
    }

    /**
     * Get seasonOwnGoals
     *
     * @return int
     */
    public function getSeasonOwnGoals()
    {
        return $this->seasonOwnGoals;
    }

    /**
     * Set allTimeOwnGoals
     *
     * @param integer $allTimeOwnGoals
     *
     * @return Player
     */
    public function setAllTimeOwnGoals($allTimeOwnGoals)
    {
        $this->allTimeOwnGoals = $allTimeOwnGoals;

        return $this;
    }

    /**
     * Get allTimeOwnGoals
     *
     * @return int
     */
    public function getAllTimeOwnGoals()
    {
        return $this->allTimeOwnGoals;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Player
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set averageGradeAllTime
     *
     * @param float $averageGradeAllTime
     *
     * @return Player
     */
    public function setAverageGradeAllTime($averageGradeAllTime)
    {
        $this->averageGradeAllTime = $averageGradeAllTime;

        return $this;
    }

    /**
     * Get averageGradeAllTime
     *
     * @return float
     */
    public function getAverageGradeAllTime()
    {
        return $this->averageGradeAllTime;
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
     * @return Player
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Player
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Player
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Player
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
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
     * @return Player
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $player_real_matches;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->player_real_matches = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add playerRealMatch
     *
     * @param \StatsBundle\Entity\PlayerRealMatch $playerRealMatch
     *
     * @return Player
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
     * @var \StatsBundle\Entity\RealTeam
     */
    private $real_team;


    /**
     * Set realTeam
     *
     * @param \StatsBundle\Entity\RealTeam $realTeam
     *
     * @return Player
     */
    public function setRealTeam(\StatsBundle\Entity\RealTeam $realTeam = null)
    {
        $this->real_team = $realTeam;

        return $this;
    }

    /**
     * Get realTeam
     *
     * @return \StatsBundle\Entity\RealTeam
     */
    public function getRealTeam()
    {
        return $this->real_team;
    }

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
     * Add synonym
     *
     * @param \StatsBundle\Entity\Synonym $synonym
     *
     * @return Player
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

    /**
     * Set seasonAverageGrade
     *
     * @param float $seasonAverageGrade
     *
     * @return Player
     */
    public function setSeasonAverageGrade($seasonAverageGrade)
    {
        $this->seasonAverageGrade = $seasonAverageGrade;

        return $this;
    }

    /**
     * Get seasonAverageGrade
     *
     * @return float
     */
    public function getSeasonAverageGrade()
    {
        return $this->seasonAverageGrade;
    }

    /**
     * Set last5AverageGrade
     *
     * @param float $last5AverageGrade
     *
     * @return Player
     */
    public function setLast5AverageGrade($last5AverageGrade)
    {
        $this->last5AverageGrade = $last5AverageGrade;

        return $this;
    }

    /**
     * Get last5AverageGrade
     *
     * @return float
     */
    public function getLast5AverageGrade()
    {
        return $this->last5AverageGrade;
    }

    /**
     * Set last10AverageGrade
     *
     * @param float $last10AverageGrade
     *
     * @return Player
     */
    public function setLast10AverageGrade($last10AverageGrade)
    {
        $this->last10AverageGrade = $last10AverageGrade;

        return $this;
    }

    /**
     * Get last10AverageGrade
     *
     * @return float
     */
    public function getLast10AverageGrade()
    {
        return $this->last10AverageGrade;
    }

    /**
     * Set last20AverageGrade
     *
     * @param float $last20AverageGrade
     *
     * @return Player
     */
    public function setLast20AverageGrade($last20AverageGrade)
    {
        $this->last20AverageGrade = $last20AverageGrade;

        return $this;
    }

    /**
     * Get last20AverageGrade
     *
     * @return float
     */
    public function getLast20AverageGrade()
    {
        return $this->last20AverageGrade;
    }

    /**
     * Set seasonHasStarted
     *
     * @param integer $seasonHasStarted
     *
     * @return Player
     */
    public function setSeasonHasStarted($seasonHasStarted)
    {
        $this->seasonHasStarted = $seasonHasStarted;

        return $this;
    }

    /**
     * Get seasonHasStarted
     *
     * @return integer
     */
    public function getSeasonHasStarted()
    {
        return $this->seasonHasStarted;
    }

    /**
     * Set allTimeHasStarted
     *
     * @param integer $allTimeHasStarted
     *
     * @return Player
     */
    public function setAllTimeHasStarted($allTimeHasStarted)
    {
        $this->allTimeHasStarted = $allTimeHasStarted;

        return $this;
    }

    /**
     * Get allTimeHasStarted
     *
     * @return string
     */
    public function getAllTimeHasStarted()
    {
        return $this->allTimeHasStarted;
    }

    /**
     * Set seasonHasEntered
     *
     * @param integer $seasonHasEntered
     *
     * @return Player
     */
    public function setSeasonHasEntered($seasonHasEntered)
    {
        $this->seasonHasEntered = $seasonHasEntered;

        return $this;
    }

    /**
     * Get seasonHasEntered
     *
     * @return integer
     */
    public function getSeasonHasEntered()
    {
        return $this->seasonHasEntered;
    }

    /**
     * Set allTimeHasEntered
     *
     * @param integer $allTimeHasEntered
     *
     * @return Player
     */
    public function setAllTimeHasEntered($allTimeHasEntered)
    {
        $this->allTimeHasEntered = $allTimeHasEntered;

        return $this;
    }

    /**
     * Get allTimeHasEntered
     *
     * @return integer
     */
    public function getAllTimeHasEntered()
    {
        return $this->allTimeHasEntered;
    }

    /**
     * Set preservedUntil
     *
     * @param string $preservedUntil
     *
     * @return Player
     */
    public function setPreservedUntil($preservedUntil)
    {
        $this->preservedUntil = $preservedUntil;

        return $this;
    }

    /**
     * Get preservedUntil
     *
     * @return string
     */
    public function getPreservedUntil()
    {
        return $this->preservedUntil;
    }

    /**
     * Set unavailableUntil
     *
     * @param string $unavailableUntil
     *
     * @return Player
     */
    public function setUnavailableUntil($unavailableUntil)
    {
        $this->unavailableUntil = $unavailableUntil;

        return $this;
    }

    /**
     * Get unavailableUntil
     *
     * @return string
     */
    public function getUnavailableUntil()
    {
        return $this->unavailableUntil;
    }

    /**
     * Set lastMatches
     *
     * @param string $lastMatches
     *
     * @return Player
     */
    public function setLastMatches($lastMatches)
    {
        $this->lastMatches = $lastMatches;

        return $this;
    }

    /**
     * Get lastMatches
     *
     * @return string
     */
    public function getLastMatches()
    {
        return $this->lastMatches;
    }


    /**
     * Set seasonYellowCards
     *
     * @param integer $seasonYellowCards
     *
     * @return Player
     */
    public function setSeasonYellowCards($seasonYellowCards)
    {
        $this->seasonYellowCards = $seasonYellowCards;

        return $this;
    }

    /**
     * Get seasonYellowCards
     *
     * @return integer
     */
    public function getSeasonYellowCards()
    {
        return $this->seasonYellowCards;
    }

    /**
     * Set seasonRedCards
     *
     * @param integer $seasonRedCards
     *
     * @return Player
     */
    public function setSeasonRedCards($seasonRedCards)
    {
        $this->seasonRedCards = $seasonRedCards;

        return $this;
    }

    /**
     * Get seasonRedCards
     *
     * @return integer
     */
    public function getSeasonRedCards()
    {
        return $this->seasonRedCards;
    }

    /**
     * Set seasonInjuries
     *
     * @param integer $seasonInjuries
     *
     * @return Player
     */
    public function setSeasonInjuries($seasonInjuries)
    {
        $this->seasonInjuries = $seasonInjuries;

        return $this;
    }

    /**
     * Get seasonInjuries
     *
     * @return integer
     */
    public function getSeasonInjuries()
    {
        return $this->seasonInjuries;
    }

    /**
     * Set allTimeInjuries
     *
     * @param integer $allTimeInjuries
     *
     * @return Player
     */
    public function setAllTimeInjuries($allTimeInjuries)
    {
        $this->allTimeInjuries = $allTimeInjuries;

        return $this;
    }

    /**
     * Get allTimeInjuries
     *
     * @return integer
     */
    public function getAllTimeInjuries()
    {
        return $this->allTimeInjuries;
    }

    /**
     * Set seasonSuspensions
     *
     * @param integer $seasonSuspensions
     *
     * @return Player
     */
    public function setSeasonSuspensions($seasonSuspensions)
    {
        $this->seasonSuspensions = $seasonSuspensions;

        return $this;
    }

    /**
     * Get seasonSuspensions
     *
     * @return integer
     */
    public function getSeasonSuspensions()
    {
        return $this->seasonSuspensions;
    }

    /**
     * Set allTimeSuspensions
     *
     * @param integer $allTimeSuspensions
     *
     * @return Player
     */
    public function setAllTimeSuspensions($allTimeSuspensions)
    {
        $this->allTimeSuspensions = $allTimeSuspensions;

        return $this;
    }

    /**
     * Get allTimeSuspensions
     *
     * @return integer
     */
    public function getAllTimeSuspensions()
    {
        return $this->allTimeSuspensions;
    }

    /**
     * Set seasonBenchs
     *
     * @param integer $seasonBenchs
     *
     * @return Player
     */
    public function setSeasonBenchs($seasonBenchs)
    {
        $this->seasonBenchs = $seasonBenchs;

        return $this;
    }

    /**
     * Get seasonBenchs
     *
     * @return integer
     */
    public function getSeasonBenchs()
    {
        return $this->seasonBenchs;
    }

    /**
     * Set allTimeBenchs
     *
     * @param integer $allTimeBenchs
     *
     * @return Player
     */
    public function setAllTimeBenchs($allTimeBenchs)
    {
        $this->allTimeBenchs = $allTimeBenchs;

        return $this;
    }

    /**
     * Get allTimeBenchs
     *
     * @return integer
     */
    public function getAllTimeBenchs()
    {
        return $this->allTimeBenchs;
    }

    /**
     * Set benchedUntil
     *
     * @param string $benchedUntil
     *
     * @return Player
     */
    public function setBenchedUntil($benchedUntil)
    {
        $this->benchedUntil = $benchedUntil;

        return $this;
    }

    /**
     * Get benchedUntil
     *
     * @return string
     */
    public function getBenchedUntil()
    {
        return $this->benchedUntil;
    }

    /**
     * Set seasonExclusions
     *
     * @param integer $seasonExclusions
     *
     * @return Player
     */
    public function setSeasonExclusions($seasonExclusions)
    {
        $this->seasonExclusions = $seasonExclusions;

        return $this;
    }

    /**
     * Get seasonExclusions
     *
     * @return integer
     */
    public function getSeasonExclusions()
    {
        return $this->seasonExclusions;
    }

    /**
     * Set allTimeExclusions
     *
     * @param integer $allTimeExclusions
     *
     * @return Player
     */
    public function setAllTimeExclusions($allTimeExclusions)
    {
        $this->allTimeExclusions = $allTimeExclusions;

        return $this;
    }

    /**
     * Get allTimeExclusions
     *
     * @return integer
     */
    public function getAllTimeExclusions()
    {
        return $this->allTimeExclusions;
    }

    /**
     * Set seasonUnavailabilities
     *
     * @param string $seasonUnavailabilities
     *
     * @return Player
     */
    public function setSeasonUnavailabilities($seasonUnavailabilities)
    {
        $this->seasonUnavailabilities = $seasonUnavailabilities;

        return $this;
    }

    /**
     * Get seasonUnavailabilities
     *
     * @return string
     */
    public function getSeasonUnavailabilities()
    {
        return $this->seasonUnavailabilities;
    }

    /**
     * Set allTimeUnavailabilities
     *
     * @param string $allTimeUnavailabilities
     *
     * @return Player
     */
    public function setAllTimeUnavailabilities($allTimeUnavailabilities)
    {
        $this->allTimeUnavailabilities = $allTimeUnavailabilities;

        return $this;
    }

    /**
     * Get allTimeUnavailabilities
     *
     * @return string
     */
    public function getAllTimeUnavailabilities()
    {
        return $this->allTimeUnavailabilities;
    }
}
