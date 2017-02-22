<?php

namespace StatsBundle\Entity;

/**
 * RealTeamRank
 */
class RealTeamRank
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $week;

    /**
     * @var int
     */
    private $realTeamId;

    /**
     * @var int
     */
    private $season;

    /**
     * @var int
     */
    private $rank;


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
     * Set week
     *
     * @param integer $week
     *
     * @return RealTeamRank
     */
    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return int
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Set realTeamId
     *
     * @param integer $realTeamId
     *
     * @return RealTeamRank
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
     * Set season
     *
     * @param integer $season
     *
     * @return RealTeamRank
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
     * Set rank
     *
     * @param integer $rank
     *
     * @return RealTeamRank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }
}

