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
 * PlayerManager
 */
class PlayerManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Container
     */
    private $container;

    /**
     * PlayerManager constructor. We need to inject this variables later.
     *
     * @param EntityManager $entityManager the em
     * @param Container     $container     the container
     */
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    /**
     * When 2 players are actually the same guy, the data need to be merged
     *
     * @param Player $mainPlayer      the player you want to keep
     * @param Player $secondaryPlayer the player you want to merge into the main one
     *
     * @return void
     */
    public function merge($mainPlayer, $secondaryPlayer)
    {
        foreach ($secondaryPlayer->getPlayerRealMatches() as $playerRealMatch) {
            /* @var $playerRealMatch PlayerRealMatch */
            $playerRealMatch->setPlayer($mainPlayer);
            $this->em->persist($playerRealMatch);
        }
        //anything is better than nothing \o/
        if (is_null($mainPlayer->getFirstname())) {
            $mainPlayer->setFirstname($secondaryPlayer->getFirstname());
        }
        if (is_null($mainPlayer->getRole())) {
            $mainPlayer->setRole($secondaryPlayer->getRole());
        }
        if (is_null($mainPlayer->getPrice())) {
            $mainPlayer->setPrice($secondaryPlayer->getPrice());
        }
        $this->em->remove($secondaryPlayer);
        $this->em->flush();
    }
}