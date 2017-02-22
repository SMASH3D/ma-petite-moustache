<?php

namespace StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use StatsBundle\Entity\RealLeague;
use StatsBundle\Entity\RealTeam;
use StatsBundle\Entity\RealMatch;

class AjaxController extends Controller
{
    public function pushMatchDetailsAction(Request $request)
    {
        $logger = $this->get('logger');
        if ($request->isXmlHttpRequest()) {
            $matchDetails = $request->request->get('data');
            $logger->info(json_decode($matchDetails));
        }
        $response = array("code" => 200, "success" => true);
        return new JsonResponse($response);
    }

    public function pushWeekSummaryAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->info(__METHOD__);
        // I AM NASTY
        $weekSummary = json_decode(file_get_contents('php://input'), true);

        $code = $this->_processWeekSummary($weekSummary);
        $success = true;
        switch ($code) {
            case 200:
                $message = 'data updated';
                break;
            case 201:
                $message = 'data was already known';
                break;
            case 300:
                $message = 'the data was empty/misformated and nothing was processed.';
                $success = false;
                break;
            default:
                $message = 'Oops - something went wrong';
                $success = false;
                break;
        }
        $response = array("code" => $code, "success" => $success, "message" => $message);
        return new JsonResponse($response);
    }

    public function getPlayerInsightAction()
    {
        return $this->render('StatsBundle:Ajax:get_player_insight.html.twig', array(
            // ...
        ));
    }

    public function getTeamInsightAction()
    {
        return $this->render('StatsBundle:Ajax:get_team_insight.html.twig', array(
            // ...
        ));
    }

    /**
     * @param $weekSummary
     */
    protected function _processWeekSummary($weekSummary)
    {
        if (empty($weekSummary)) {
            $code = 300;
        } else {
            $league = $this->_getLeague($weekSummary);

            $this->_setWeekRealGames($league, $weekSummary);


        }

        return $code;
    }

    private function _getLeague($weekSummary)
    {
        $championshipId = (isset($weekSummary['championshipID']) ? $weekSummary['championshipID'] : null);
        $name = (isset($weekSummary['championship']) ? $weekSummary['championship'] : null);

        $league = $this->getDoctrine()
            ->getRepository('StatsBundle:RealLeague')
            ->find($championshipId);

        if (is_null($league)) {
            $em = $this->getDoctrine()->getManager();
            $league = New RealLeague();
            $league->setId($championshipId);
            $league->setSeason(date('Y'));
            $league->setName($name);
            
            $em->persist($league);
            $em->flush();
        }
        return $league;
    }
    
    private function _setWeekRealGames($league, $weekSummary)
    {
        $em = $this->getDoctrine()->getManager();
        $week = (isset($weekSummary['week']) ? $weekSummary['week'] : null);
        $games = (isset($weekSummary['games']) ? $weekSummary['games'] : array());
        $realMatches = $this->getDoctrine()
            ->getRepository('StatsBundle:RealMatch')
            ->findById(array_keys($games));
        //loop through existing matches to see whether we have something to update
        foreach ($realMatches as $realMatch) {
            foreach ($games[$realMatch->getId()] as $matchAttribute => $value) {
                if ($realMatch->getData($matchAttribute) != $value) {
                    //need to update this match in db
                }
            }
            //removing the updated game from the pool of games to treat
            unset($games[$realMatch->getId()]);
            //$em->persist($realMatch);
        }
        //we need to create
        foreach ($games as $game) {
            if (isset($game['url'])) {
                $game = New RealGame();
                $game->setId($game['id']);
                $game->setSeason(date('Y'));
                $game->setWeek($week);

                $game->setPlayed(true);
                $game->setHomeTeamScore($game['home_team_score']);
                $game->setAwayTeamScore($game['away_team_score']);

            }

            //$em->persist($game);
            //$em->flush();
        }
    }

    private function _getTeamIdFromName()
    {

    }
}
