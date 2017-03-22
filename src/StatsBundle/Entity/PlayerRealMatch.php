<?php

namespace StatsBundle\Entity;

/**
 * PlayerRealMatch
 */
class PlayerRealMatch
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $starter;

    /**
     * @var bool
     */
    private $hasStarted;

    /**
     * @var bool
     */
    private $hasEntered;

    /**
     * @var int
     */
    private $yellowCards;

    /**
     * @var bool
     */
    private $redCard;

    /**
     * @var int
     */
    private $goals;

    /**
     * @var int
     */
    private $assists;

    /**
     * @var int
     */
    private $ownGoal;

    /**
     * @var float
     */
    private $rating;

    /**
     * @var int
     */
    private $minutesPlayed;

    /**
     * @var int
     */
    private $errorsLeadingToGoal;

    /**
     * @var \StatsBundle\Entity\RealMatch
     */
    private $real_match;

    /**
     * @var integer
     */
    private $playerId;

    /**
     * @var \StatsBundle\Entity\Player
     */
    private $player;
    /**
     * @var integer
     */
    private $realMatchId;

    /**
     * @var integer
     */
    private $ownGoals = 0;

    /**
     * @var boolean
     */
    private $wasSuspended = 0;

    /**
     * @var boolean
     */
    private $wasPreserved = 0;

    /**
     * @var boolean
     */
    private $wasInjured = 0;

    /**
     * @var boolean
     */
    private $wasUnavailable = 0;

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
     * Set starter
     *
     * @param boolean $starter
     *
     * @return PlayerMatch
     */
    public function setStarter($starter)
    {
        $this->starter = $starter;

        return $this;
    }

    /**
     * Get starter
     *
     * @return bool
     */
    public function getStarter()
    {
        return $this->starter;
    }

    /**
     * Set hasStarted
     *
     * @param boolean $hasStarted
     *
     * @return PlayerMatch
     */
    public function setHasStarted($hasStarted)
    {
        $this->hasStarted = $hasStarted;

        return $this;
    }

    /**
     * Get hasStarted
     *
     * @return bool
     */
    public function getHasStarted()
    {
        return $this->hasStarted;
    }

    /**
     * Set hasEntered
     *
     * @param boolean $hasEntered
     *
     * @return PlayerMatch
     */
    public function setHasEntered($hasEntered)
    {
        $this->hasEntered = $hasEntered;

        return $this;
    }

    /**
     * Get hasEntered
     *
     * @return bool
     */
    public function getHasEntered()
    {
        return $this->hasEntered;
    }

    /**
     * Set yellowCards
     *
     * @param integer $yellowCards
     *
     * @return PlayerMatch
     */
    public function setYellowCards($yellowCards)
    {
        $this->yellowCards = $yellowCards;

        return $this;
    }

    /**
     * Get yellowCards
     *
     * @return int
     */
    public function getYellowCards()
    {
        return $this->yellowCards;
    }

    /**
     * Set redCard
     *
     * @param boolean $redCard
     *
     * @return PlayerMatch
     */
    public function setRedCard($redCard)
    {
        $this->redCard = $redCard;

        return $this;
    }

    /**
     * Get redCard
     *
     * @return bool
     */
    public function getRedCard()
    {
        return $this->redCard;
    }

    /**
     * Set goals
     *
     * @param integer $goals
     *
     * @return PlayerMatch
     */
    public function setGoals($goals)
    {
        $this->goals = $goals;

        return $this;
    }

    /**
     * Get goals
     *
     * @return int
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Set assists
     *
     * @param integer $assists
     *
     * @return PlayerMatch
     */
    public function setAssists($assists)
    {
        $this->assists = $assists;

        return $this;
    }

    /**
     * Get assists
     *
     * @return int
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * Set ownGoal
     *
     * @param integer $ownGoal
     *
     * @return PlayerMatch
     */
    public function setOwnGoal($ownGoal)
    {
        $this->ownGoal = $ownGoal;

        return $this;
    }

    /**
     * Get ownGoal
     *
     * @return int
     */
    public function getOwnGoal()
    {
        return $this->ownGoal;
    }

    /**
     * Set rating
     *
     * @param float $rating
     *
     * @return PlayerMatch
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set minutesPlayed
     *
     * @param integer $minutesPlayed
     *
     * @return PlayerMatch
     */
    public function setMinutesPlayed($minutesPlayed)
    {
        $this->minutesPlayed = $minutesPlayed;

        return $this;
    }

    /**
     * Get minutesPlayed
     *
     * @return int
     */
    public function getMinutesPlayed()
    {
        return $this->minutesPlayed;
    }

    /**
     * Set errorsLeadingToGoal
     *
     * @param integer $errorsLeadingToGoal
     *
     * @return PlayerMatch
     */
    public function setErrorsLeadingToGoal($errorsLeadingToGoal)
    {
        $this->errorsLeadingToGoal = $errorsLeadingToGoal;

        return $this;
    }

    /**
     * Get errorsLeadingToGoal
     *
     * @return int
     */
    public function getErrorsLeadingToGoal()
    {
        return $this->errorsLeadingToGoal;
    }

    /**
     * Set realMatch
     *
     * @param \StatsBundle\Entity\RealMatch $realMatch
     *
     * @return PlayerRealMatch
     */
    public function setRealMatch(\StatsBundle\Entity\RealMatch $realMatch = null)
    {
        $this->real_match = $realMatch;

        return $this;
    }

    /**
     * Get realMatch
     *
     * @return \StatsBundle\Entity\RealMatch
     */
    public function getRealMatch()
    {
        return $this->real_match;
    }

    /**
     * Set playerId
     *
     * @param integer $playerId
     *
     * @return PlayerRealMatch
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get playerId
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Set player
     *
     * @param \StatsBundle\Entity\Player $player
     *
     * @return PlayerRealMatch
     */
    public function setPlayer(\StatsBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \StatsBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set realMatchId
     *
     * @param integer $realMatchId
     *
     * @return PlayerRealMatch
     */
    public function setRealMatchId($realMatchId)
    {
        $this->realMatchId = $realMatchId;

        return $this;
    }

    /**
     * Get realMatchId
     *
     * @return integer
     */
    public function getRealMatchId()
    {
        return $this->realMatchId;
    }


    /**
     * Set ownGoals
     *
     * @param integer $ownGoals
     *
     * @return PlayerRealMatch
     */
    public function setOwnGoals($ownGoals)
    {
        $this->ownGoals = $ownGoals;

        return $this;
    }

    /**
     * Get ownGoals
     *
     * @return integer
     */
    public function getOwnGoals()
    {
        return $this->ownGoals;
    }

    /**
     * Set wasSuspended
     *
     * @param boolean $wasSuspended
     *
     * @return PlayerRealMatch
     */
    public function setWasSuspended($wasSuspended)
    {
        $this->wasSuspended = $wasSuspended;

        return $this;
    }

    /**
     * Get wasSuspended
     *
     * @return boolean
     */
    public function getWasSuspended()
    {
        return $this->wasSuspended;
    }

    /**
     * Set wasPreserved
     *
     * @param boolean $wasPreserved
     *
     * @return PlayerRealMatch
     */
    public function setWasPreserved($wasPreserved)
    {
        $this->wasPreserved = $wasPreserved;

        return $this;
    }

    /**
     * Get wasPreserved
     *
     * @return boolean
     */
    public function getWasPreserved()
    {
        return $this->wasPreserved;
    }

    /**
     * Set wasInjured
     *
     * @param boolean $wasInjured
     *
     * @return PlayerRealMatch
     */
    public function setWasInjured($wasInjured)
    {
        $this->wasInjured = $wasInjured;

        return $this;
    }

    /**
     * Get wasInjured
     *
     * @return boolean
     */
    public function getWasInjured()
    {
        return $this->wasInjured;
    }

    /**
     * Set wasUnavailable
     *
     * @param boolean $wasUnavailable
     *
     * @return PlayerRealMatch
     */
    public function setWasUnavailable($wasUnavailable)
    {
        $this->wasUnavailable = $wasUnavailable;

        return $this;
    }

    /**
     * Get wasUnavailable
     *
     * @return boolean
     */
    public function getWasUnavailable()
    {
        return $this->wasUnavailable;
    }
}
