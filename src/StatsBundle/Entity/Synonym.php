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
     * @var \StatsBundle\Entity\RealTeam
     */
    private $real_team;

    /**
     * Set playerId
     *
     * @param integer $playerId the playerId
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
     * @param integer $teamId the teamId
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
     * @param string $actualName the actual name
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
     * @param string $synonym the synonym
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
     * @param \StatsBundle\Entity\Player $player the player
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
     * Set realTeam
     *
     * @param \StatsBundle\Entity\RealTeam $realTeam
     *
     * @return Synonym
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

}
