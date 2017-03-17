<?php

namespace StatsBundle\Controller;

use StatsBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Player controller.
 *
 */
class PlayerController extends Controller
{
    /**
     * Lists all player entities.
     *
     * @return void
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $players = $em->getRepository('StatsBundle:Player')->findAll();

        return $this->render('player/index.html.twig', array(
            'players' => $players,
        ));
    }

    /**
     * Finds and displays a player entity.
     *
     * @param Player $player the player
     *
     * @return void
     */
    public function showAction(Player $player)
    {
        $deleteForm = $this->createDeleteForm($player);

        return $this->render('player/show.html.twig', array(
            'player' => $player,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
