<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use StatsBundle\Entity\RealMatch;
use StatsBundle\Entity\RealLeague;
use StatsBundle\Entity\RealTeam;
use StatsBundle\Entity\Player;
use StatsBundle\Entity\PlayerRealMatch;

/**
 * RealTeamManager
 */
class RealTeamManager
{


    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Container
     */
    private $container;

    // We need to inject this variables later.
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    /**
     * When 2 teams are actually the same team, the data need to be merged
     *
     * @param RealTeam $mainTeam      the team you want to keep
     * @param RealTeam $secondaryTeam the team you want to merge into the main one
     *
     * @return void
     */
    public function merge($mainTeam, $secondaryTeam)
    {
        foreach ($secondaryTeam->getRealMatches() as $realMatch) {
            /* @var $realMatch RealMatch */
            if ($realMatch->getAwayTeam()->getId() == $secondaryTeam->getId()) {
                $realMatch->setAwayTeam($mainTeam);
            } else {
                $realMatch->setHomeTeam($mainTeam);
            }
            $this->em->persist($realMatch);
        }
        $this->em->remove($secondaryTeam);
        $this->em->flush();
    }
}