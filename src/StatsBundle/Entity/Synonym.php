<?php

namespace StatsBundle\Entity;

/**
 * Synonym
 */
class Synonym
{
    /**
     * @var int
     */
    private $id;
    
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
     * @var integer
     */
    private $playerId;

    /**
     * @var integer
     */
    private $teamId;

    /**
     * @var string
     */
    private $actualName;

    /**
     * @var string
     */
    private $synonym;

    /**
     * @var \StatsBundle\Entity\Player
     */
    private $player;

    /**
     * @var \StatsBundle\Entity\Real_Team
     */
    private $team;


    /**
     * Set playerId
     *
     * @param integer $playerId
     *
     * @return Synonym
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
     * Set teamId
     *
     * @param integer $teamId
     *
     * @return Synonym
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return integer
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Set actualName
     *
     * @param string $actualName
     *
     * @return Synonym
     */
    public function setActualName($actualName)
    {
        $this->actualName = $actualName;

        return $this;
    }

    /**
     * Get actualName
     *
     * @return string
     */
    public function getActualName()
    {
        return $this->actualName;
    }

    /**
     * Set synonym
     *
     * @param string $synonym
     *
     * @return Synonym
     */
    public function setSynonym($synonym)
    {
        $this->synonym = $synonym;

        return $this;
    }

    /**
     * Get synonym
     *
     * @return string
     */
    public function getSynonym()
    {
        return $this->synonym;
    }

    /**
     * Set player
     *
     * @param \StatsBundle\Entity\Player $player
     *
     * @return Synonym
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
     * Set team
     *
     * @param \StatsBundle\Entity\Real_Team $team
     *
     * @return Synonym
     */
    public function setTeam(\StatsBundle\Entity\Real_Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \StatsBundle\Entity\Real_Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}
