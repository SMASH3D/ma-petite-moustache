<?php

namespace StatsBundle\Controller;

use StatsBundle\Entity\RealLeague;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Realleague controller.
 *
 */
class RealLeagueController extends Controller
{
    /**
     * Lists all realLeague entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $realLeagues = $em->getRepository('StatsBundle:RealLeague')->findAll();

        return $this->render('realleague/index.html.twig', array(
            'realLeagues' => $realLeagues,
        ));
    }

    /**
     * Finds and displays a realLeague entity.
     *
     */
    public function showAction(RealLeague $realLeague)
    {

        return $this->render('realleague/show.html.twig', array(
            'realLeague' => $realLeague,
        ));
    }
}
