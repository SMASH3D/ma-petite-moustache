<?php

namespace StatsBundle\Controller;

use StatsBundle\Entity\RealTeam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Realteam controller.
 *
 */
class RealTeamController extends Controller
{
    /**
     * Lists all realTeam entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $realTeams = $em->getRepository('StatsBundle:RealTeam')->findAll();

        return $this->render('realteam/index.html.twig', array(
            'realTeams' => $realTeams,
        ));
    }

    /**
     * Finds and displays a realTeam entity.
     *
     */
    public function showAction(RealTeam $realTeam)
    {

        return $this->render('realteam/show.html.twig', array(
            'realTeam' => $realTeam,
        ));
    }
}
