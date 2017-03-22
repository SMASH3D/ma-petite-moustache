<?php

namespace StatsBundle\Service;

use Doctrine\ORM\EntityManager;
use StatsBundle\Entity\Synonym;
use StatsBundle\Entity\Player;
use StatsBundle\Entity\RealTeam;

/**
 * SynonymManager
 */
class SynonymManager
{
    /**
     * @var EntityManager
     */
    protected $_em;

    /**
     * SynonymManager constructor. We need to inject this variables later.
     *
     * @param EntityManager $entityManager the entity manage
     *
     * @return SynonymManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
    }

    /**
     * Creates a synonym for an entity : whenever the MPG parser will send data linked with a synonym,
     * it will be redirected toward the main entity
     *
     * @param Player/RealTeam $mainEntity the entity for which you want to create an a.k.a.
     * @param string          $aka        the synonym of the main entity name
     *
     * @return void
     */
    public function addSynonym($mainEntity, $aka)
    {
        $synonym = new Synonym();
        if ($mainEntity instanceof Player) {
            $synonym->setPlayer($mainEntity);
            $synonym->setActualName($mainEntity->getLastname());
            $synonym->setRealTeam($mainEntity->getRealTeam());
        } else if ($mainEntity instanceof RealTeam) {
            $synonym->setRealTeam($mainEntity);
            $synonym->setActualName($mainEntity->getName());
        }

        $synonym->setSynonym($aka);

        $this->_em->persist($synonym);
        $this->_em->flush();
    }

    /**
     * tries whether a player name is a synonym for the same player
     *
     * @param string  $name       the name sent by the parser
     * @param integer $realTeamId the teamID
     *
     * @return null/string
     */
    public function getIsSynonymFor($name, $realTeamId)
    {
        $aka = null;
        $synonym = $this->_em
            ->getRepository('StatsBundle:Synonym')
            ->createQueryBuilder('s')
            ->where('s.synonym = :name')
            ->andWhere('s.teamId = :teamId')
            ->setParameter('name', $name)
            ->setParameter('teamId', $realTeamId)
            ->getQuery()
            ->setMaxResults(1)
            ->getResult();

        if (!empty($synonym)) {
            $aka = reset($synonym)->getActualName();
        }

        return $aka;
    }
}
