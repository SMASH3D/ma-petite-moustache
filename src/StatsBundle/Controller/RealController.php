<?php
namespace StatsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RealController
 * @package AppBundle\Controller
 */
class RealController extends Controller
{
    /**
    * @Route("/real/league")
    */
    public function leagueAction()
    {
        return $this->render('real/league.html.twig', array(
            'league_name' => 'Ligue 1',
        ));
    }
}
