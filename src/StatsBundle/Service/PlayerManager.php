<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
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
    protected $_em;

    /**
     * PlayerManager constructor. We need to inject this variables later.
     *
     * @param EntityManager $entityManager the em
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
    }

    /**
     * When 2 players are actually the same guy, the data need to be merged
     *
     * @param Player $mainPlayer      the player you want to keep
     * @param Player $secondaryPlayer the player you want to merge into the main one
     *
     * @return void
     */
    public function merge(Player $mainPlayer, Player $secondaryPlayer)
    {
        foreach ($secondaryPlayer->getPlayerRealMatches() as $playerRealMatch) {
            /* @var $playerRealMatch PlayerRealMatch */
            $playerRealMatch->setPlayer($mainPlayer);
            $this->_em->persist($playerRealMatch);
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
        $this->_em->remove($secondaryPlayer);
        $this->_em->flush();
    }
}