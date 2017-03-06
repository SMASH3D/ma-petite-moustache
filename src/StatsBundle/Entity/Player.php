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
    private $name;

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $realTeamId;

    /**
     * @var \DateTime
     */
    private $joinedAt;

    /**
     * @var float
     */
    private $averageGrade;

    /**
     * @var float
     */
    private $lowestGrade;

    /**
     * @var float
     */
    private $highestGrade;

    /**
     * @var float
     */
    private $mostFrequentGrade;

    /**
     * @var bool
     */
    private $injured;

    /**
     * @var \DateTime
     */
    private $injuredUntil;

    /**
     * @var bool
     */
    private $suspended;

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
    private $seasonDecisivePasses;

    /**
     * @var int
     */
    private $injuriesCount;

    /**
     * @var int
     */
    private $exclusions;

    /**
     * @var int
     */
    private $seasonYellowCards;

    /**
     * @var int
     */
    private $seasonRedCards;

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
     * @var \DateTime
     */
    private $leftAt;

    /**
     * @var int
     */
    private $seasonInjuries;

    /**
     * @var int
     */
    private $allTimeDecisivePasses;

    /**
     * @var int
     */
    private $seasonOwnGoals;

    /**
     * @var int
     */
    private $allTimeOwnGoals;

    /**
     * @var int
     */
    private $seasonMinutesPlayed;

    /**
     * @var int
     */
    private $allTimeMinutesPlayed;

    /**
     * @var int
     */
    private $seasonStarts;

    /**
     * @var int
     */
    private $seasonEntries;

    /**
     * @var int
     */
    private $allTimeStarts;

    /**
     * @var int
     */
    private $allTimeEntries;

    /**
     * @var bool
     */
    private $away;

    /**
     * @var \DateTime
     */
    private $awayUntil;

    /**
     * @var int
     */
    private $allTimeUnavailabilityDays;

    /**
     * @var int
     */
    private $seasonsPlayed;

    /**
     * @var string
     */
    private $nationality;

    /**
     * @var bool
     */
    private $captain;

    /**
     * @var float
     */
    private $averageGradeAllTime;

    /**
     * @var integer
     */
    private $suspendedUntilDay;


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
     * Set name
     *
     * @param string $name
     *
     * @return Player
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
     * Set joinedAt
     *
     * @param \DateTime $joinedAt
     *
     * @return Player
     */
    public function setJoinedAt($joinedAt)
    {
        $this->joinedAt = $joinedAt;

        return $this;
    }

    /**
     * Get joinedAt
     *
     * @return \DateTime
     */
    public function getJoinedAt()
    {
        return $this->joinedAt;
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
     * Set lowestGrade
     *
     * @param float $lowestGrade
     *
     * @return Player
     */
    public function setLowestGrade($lowestGrade)
    {
        $this->lowestGrade = $lowestGrade;

        return $this;
    }

    /**
     * Get lowestGrade
     *
     * @return float
     */
    public function getLowestGrade()
    {
        return $this->lowestGrade;
    }

    /**
     * Set highestGrade
     *
     * @param float $highestGrade
     *
     * @return Player
     */
    public function setHighestGrade($highestGrade)
    {
        $this->highestGrade = $highestGrade;

        return $this;
    }

    /**
     * Get highestGrade
     *
     * @return float
     */
    public function getHighestGrade()
    {
        return $this->highestGrade;
    }

    /**
     * Set mostFrequentGrade
     *
     * @param float $mostFrequentGrade
     *
     * @return Player
     */
    public function setMostFrequentGrade($mostFrequentGrade)
    {
        $this->mostFrequentGrade = $mostFrequentGrade;

        return $this;
    }

    /**
     * Get mostFrequentGrade
     *
     * @return float
     */
    public function getMostFrequentGrade()
    {
        return $this->mostFrequentGrade;
    }

    /**
     * Set injured
     *
     * @param boolean $injured
     *
     * @return Player
     */
    public function setInjured($injured)
    {
        $this->injured = $injured;

        return $this;
    }

    /**
     * Get injured
     *
     * @return bool
     */
    public function getInjured()
    {
        return $this->injured;
    }

    /**
     * Set injuredUntil
     *
     * @param \DateTime $injuredUntil
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
     * @return \DateTime
     */
    public function getInjuredUntil()
    {
        return $this->injuredUntil;
    }

    /**
     * Set suspended
     *
     * @param boolean $suspended
     *
     * @return Player
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;

        return $this;
    }

    /**
     * Get suspended
     *
     * @return bool
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * Set suspendedUntil
     *
     * @param \DateTime $suspendedUntil
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
     * @return \DateTime
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
     * Set seasonDecisivePasses
     *
     * @param integer $seasonDecisivePasses
     *
     * @return Player
     */
    public function setSeasonDecisivePasses($seasonDecisivePasses)
    {
        $this->seasonDecisivePasses = $seasonDecisivePasses;

        return $this;
    }

    /**
     * Get seasonDecisivePasses
     *
     * @return int
     */
    public function getSeasonDecisivePasses()
    {
        return $this->seasonDecisivePasses;
    }

    /**
     * Set injuriesCount
     *
     * @param integer $injuriesCount
     *
     * @return Player
     */
    public function setInjuriesCount($injuriesCount)
    {
        $this->injuriesCount = $injuriesCount;

        return $this;
    }

    /**
     * Get injuriesCount
     *
     * @return int
     */
    public function getInjuriesCount()
    {
        return $this->injuriesCount;
    }

    /**
     * Set exclusions
     *
     * @param integer $exclusions
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
     * @return int
     */
    public function getExclusions()
    {
        return $this->exclusions;
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
     * @return int
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
     * @return int
     */
    public function getSeasonRedCards()
    {
        return $this->seasonRedCards;
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
     * Set leftAt
     *
     * @param \DateTime $leftAt
     *
     * @return Player
     */
    public function setLeftAt($leftAt)
    {
        $this->leftAt = $leftAt;

        return $this;
    }

    /**
     * Get leftAt
     *
     * @return \DateTime
     */
    public function getLeftAt()
    {
        return $this->leftAt;
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
     * @return int
     */
    public function getSeasonInjuries()
    {
        return $this->seasonInjuries;
    }

    /**
     * Set allTimeDecisivePasses
     *
     * @param integer $allTimeDecisivePasses
     *
     * @return Player
     */
    public function setAllTimeDecisivePasses($allTimeDecisivePasses)
    {
        $this->allTimeDecisivePasses = $allTimeDecisivePasses;

        return $this;
    }

    /**
     * Get allTimeDecisivePasses
     *
     * @return int
     */
    public function getAllTimeDecisivePasses()
    {
        return $this->allTimeDecisivePasses;
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
     * Set seasonMinutesPlayed
     *
     * @param integer $seasonMinutesPlayed
     *
     * @return Player
     */
    public function setSeasonMinutesPlayed($seasonMinutesPlayed)
    {
        $this->seasonMinutesPlayed = $seasonMinutesPlayed;

        return $this;
    }

    /**
     * Get seasonMinutesPlayed
     *
     * @return int
     */
    public function getSeasonMinutesPlayed()
    {
        return $this->seasonMinutesPlayed;
    }

    /**
     * Set allTimeMinutesPlayed
     *
     * @param integer $allTimeMinutesPlayed
     *
     * @return Player
     */
    public function setAllTimeMinutesPlayed($allTimeMinutesPlayed)
    {
        $this->allTimeMinutesPlayed = $allTimeMinutesPlayed;

        return $this;
    }

    /**
     * Get allTimeMinutesPlayed
     *
     * @return int
     */
    public function getAllTimeMinutesPlayed()
    {
        return $this->allTimeMinutesPlayed;
    }

    /**
     * Set seasonStarts
     *
     * @param integer $seasonStarts
     *
     * @return Player
     */
    public function setSeasonStarts($seasonStarts)
    {
        $this->seasonStarts = $seasonStarts;

        return $this;
    }

    /**
     * Get seasonStarts
     *
     * @return int
     */
    public function getSeasonStarts()
    {
        return $this->seasonStarts;
    }

    /**
     * Set seasonEntries
     *
     * @param integer $seasonEntries
     *
     * @return Player
     */
    public function setSeasonEntries($seasonEntries)
    {
        $this->seasonEntries = $seasonEntries;

        return $this;
    }

    /**
     * Get seasonEntries
     *
     * @return int
     */
    public function getSeasonEntries()
    {
        return $this->seasonEntries;
    }

    /**
     * Set allTimeStarts
     *
     * @param integer $allTimeStarts
     *
     * @return Player
     */
    public function setAllTimeStarts($allTimeStarts)
    {
        $this->allTimeStarts = $allTimeStarts;

        return $this;
    }

    /**
     * Get allTimeStarts
     *
     * @return int
     */
    public function getAllTimeStarts()
    {
        return $this->allTimeStarts;
    }

    /**
     * Set allTimeEntries
     *
     * @param integer $allTimeEntries
     *
     * @return Player
     */
    public function setAllTimeEntries($allTimeEntries)
    {
        $this->allTimeEntries = $allTimeEntries;

        return $this;
    }

    /**
     * Get allTimeEntries
     *
     * @return int
     */
    public function getAllTimeEntries()
    {
        return $this->allTimeEntries;
    }

    /**
     * Set away
     *
     * @param boolean $away
     *
     * @return Player
     */
    public function setAway($away)
    {
        $this->away = $away;

        return $this;
    }

    /**
     * Get away
     *
     * @return bool
     */
    public function getAway()
    {
        return $this->away;
    }

    /**
     * Set awayUntil
     *
     * @param \DateTime $awayUntil
     *
     * @return Player
     */
    public function setAwayUntil($awayUntil)
    {
        $this->awayUntil = $awayUntil;

        return $this;
    }

    /**
     * Get awayUntil
     *
     * @return \DateTime
     */
    public function getAwayUntil()
    {
        return $this->awayUntil;
    }

    /**
     * Set allTimeUnavailabilityDays
     *
     * @param integer $allTimeUnavailabilityDays
     *
     * @return Player
     */
    public function setAllTimeUnavailabilityDays($allTimeUnavailabilityDays)
    {
        $this->allTimeUnavailabilityDays = $allTimeUnavailabilityDays;

        return $this;
    }

    /**
     * Get allTimeUnavailabilityDays
     *
     * @return int
     */
    public function getAllTimeUnavailabilityDays()
    {
        return $this->allTimeUnavailabilityDays;
    }

    /**
     * Set seasonsPlayed
     *
     * @param integer $seasonsPlayed
     *
     * @return Player
     */
    public function setSeasonsPlayed($seasonsPlayed)
    {
        $this->seasonsPlayed = $seasonsPlayed;

        return $this;
    }

    /**
     * Get seasonsPlayed
     *
     * @return int
     */
    public function getSeasonsPlayed()
    {
        return $this->seasonsPlayed;
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
     * Set captain
     *
     * @param boolean $captain
     *
     * @return Player
     */
    public function setCaptain($captain)
    {
        $this->captain = $captain;

        return $this;
    }

    /**
     * Get captain
     *
     * @return bool
     */
    public function getCaptain()
    {
        return $this->captain;
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
     * Set suspendedUntilDay
     *
     * @param integer $suspendedUntilDay
     *
     * @return Player
     */
    public function setSuspendedUntilDay($suspendedUntilDay)
    {
        $this->suspendedUntilDay = $suspendedUntilDay;

        return $this;
    }

    /**
     * Get suspendedUntilDay
     *
     * @return integer
     */
    public function getSuspendedUntilDay()
    {
        return $this->suspendedUntilDay;
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
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var integer
     */
    private $suspendedUntilWeek;

    /**
     * @var integer
     */
    private $seasonAssists;

    /**
     * @var integer
     */
    private $allTimeAssists;

    /**
     * @var integer
     */
    private $allTimeUnavailabilityWeeks;


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
     * Set suspendedUntilWeek
     *
     * @param integer $suspendedUntilWeek
     *
     * @return Player
     */
    public function setSuspendedUntilWeek($suspendedUntilWeek)
    {
        $this->suspendedUntilWeek = $suspendedUntilWeek;

        return $this;
    }

    /**
     * Get suspendedUntilWeek
     *
     * @return integer
     */
    public function getSuspendedUntilWeek()
    {
        return $this->suspendedUntilWeek;
    }

    /**
     * Set seasonAssists
     *
     * @param integer $seasonAssists
     *
     * @return Player
     */
    public function setSeasonAssists($seasonAssists)
    {
        $this->seasonAssists = $seasonAssists;

        return $this;
    }

    /**
     * Get seasonAssists
     *
     * @return integer
     */
    public function getSeasonAssists()
    {
        return $this->seasonAssists;
    }

    /**
     * Set allTimeAssists
     *
     * @param integer $allTimeAssists
     *
     * @return Player
     */
    public function setAllTimeAssists($allTimeAssists)
    {
        $this->allTimeAssists = $allTimeAssists;

        return $this;
    }

    /**
     * Get allTimeAssists
     *
     * @return integer
     */
    public function getAllTimeAssists()
    {
        return $this->allTimeAssists;
    }

    /**
     * Set allTimeUnavailabilityWeeks
     *
     * @param integer $allTimeUnavailabilityWeeks
     *
     * @return Player
     */
    public function setAllTimeUnavailabilityWeeks($allTimeUnavailabilityWeeks)
    {
        $this->allTimeUnavailabilityWeeks = $allTimeUnavailabilityWeeks;

        return $this;
    }

    /**
     * Get allTimeUnavailabilityWeeks
     *
     * @return integer
     */
    public function getAllTimeUnavailabilityWeeks()
    {
        return $this->allTimeUnavailabilityWeeks;
    }
    /**
     * @var integer
     */
    private $price;


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
}
