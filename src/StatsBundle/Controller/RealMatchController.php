<?php

namespace StatsBundle\Controller;

use StatsBundle\Entity\RealMatch;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Realmatch controller.
 *
 */
class RealMatchController extends Controller
{
    /**
     * Lists all realMatch entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $realMatches = $em->getRepository('StatsBundle:RealMatch')->findAll();

        return $this->render('realmatch/index.html.twig', array(
            'realMatches' => $realMatches,
        ));
    }

    /**
     * Finds and displays a realMatch entity.
     *
     */
    public function showAction(RealMatch $realMatch)
    {

        return $this->render('realmatch/show.html.twig', array(
            'realMatch' => $realMatch,
        ));
    }
}
