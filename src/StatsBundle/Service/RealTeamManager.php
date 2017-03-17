<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
use StatsBundle\Entity\RealMatch;
use StatsBundle\Entity\RealTeam;

/**
 * RealTeamManager
 */
class RealTeamManager
{
    /**
     * @var EntityManager
     */
    protected $_em;

    /**
     * RealTeamManager constructor.
     *
     * @param EntityManager $entityManager the em
     *
     * @return RealTeamManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
    }

    /**
     * When 2 teams are actually the same team, the data need to be merged
     *
     * @param RealTeam $mainTeam      the team you want to keep
     * @param RealTeam $secondaryTeam the team you want to merge into the main one
     *
     * @return void
     */
    public function merge(RealTeam $mainTeam, RealTeam $secondaryTeam)
    {
        foreach ($secondaryTeam->getRealMatches() as $realMatch) {
            /* @var $realMatch RealMatch */
            if ($realMatch->getAwayTeam()->getId() == $secondaryTeam->getId()) {
                $realMatch->setAwayTeam($mainTeam);
            } else {
                $realMatch->setHomeTeam($mainTeam);
            }
            $this->_em->persist($realMatch);
        }
        $this->_em->remove($secondaryTeam);
        $this->_em->flush();
    }
}