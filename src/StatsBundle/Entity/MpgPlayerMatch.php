<?php

namespace StatsBundle\Entity;

/**
 * MpgPlayerMatch
 */
class MpgPlayerMatch
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $goalsScored;

    /**
     * @var int
     */
    private $ownGoalsScored;

    /**
     * @var float
     */
    private $bonus;


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
     * Set goalsScored
     *
     * @param integer $goalsScored
     *
     * @return MpgPlayerMatch
     */
    public function setGoalsScored($goalsScored)
    {
        $this->goalsScored = $goalsScored;

        return $this;
    }

    /**
     * Get goalsScored
     *
     * @return int
     */
    public function getGoalsScored()
    {
        return $this->goalsScored;
    }

    /**
     * Set ownGoalsScored
     *
     * @param integer $ownGoalsScored
     *
     * @return MpgPlayerMatch
     */
    public function setOwnGoalsScored($ownGoalsScored)
    {
        $this->ownGoalsScored = $ownGoalsScored;

        return $this;
    }

    /**
     * Get ownGoalsScored
     *
     * @return int
     */
    public function getOwnGoalsScored()
    {
        return $this->ownGoalsScored;
    }

    /**
     * Set bonus
     *
     * @param float $bonus
     *
     * @return MpgPlayerMatch
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return float
     */
    public function getBonus()
    {
        return $this->bonus;
    }
}
