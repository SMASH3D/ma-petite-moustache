<?php

namespace StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use StatsBundle\Service\Aggregator;
use StatsBundle\Entity\RealLeague;
use StatsBundle\Entity\RealMatch;
use StatsBundle\Entity\RealTeam;

/**
 * Class AjaxController
 *
 * @package StatsBundle\Controller
 */
class AjaxController extends Controller
{

    //######################################## ACTIONS ##########################################
    /**
     * Method to get the aggregated data for a player
     * TODO
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getPlayerInsightAction()
    {
        return $this->render('StatsBundle:Ajax:get_player_insight.html.twig', array(
            // ...
        ));
    }

    /**
     * Method to get the aggregated data for a team
     * TODO
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getTeamInsightAction()
    {
        return $this->render('StatsBundle:Ajax:get_team_insight.html.twig', array(
            // ...
        ));
    }

    /**
     * pushMatchDetails action: the chrome extension sends a match summary within a json thing
     * we process them and store aggregated data in the db
     *
     * @param Request $request the request
     *
     * @return JsonResponse
     */
    public function pushMatchDetailsAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $matchDetails = $request->request->get('data');
        }
        $response = array("code" => 200, "success" => true);
        return new JsonResponse($response);
    }

    /**
     * pushWeekSummary action: the chrome extension sends a week summary within a json thing
     * we process them and store aggregated data in the db
     *
     * @return JsonResponse
     */
    public function pushWeekSummaryAction()
    {
        $weekSummary = $this->_getJsonInput();
        $code = $this->_processWeekSummary($weekSummary);
        return $this->_sendFeedback($code);
    }

    //######################################## UTILITIES ##########################################
    /**
     * gets the json input from the request and stores it into a class variable
     *
     * @return mixed
     */
    private function _getJsonInput()
    {
        // I AM NASTY
        if (empty($this->_jsonInput)) {
            $this->_jsonInput = json_decode(file_get_contents('php://input'), true);
        }
        return $this->_jsonInput;
    }

    /**
     * Sends a brief feedback to the chrome extension to acknowledge the data it just sent
     *
     * @param integer $code the response code
     *
     * @return JsonResponse
     */
    private function _sendFeedback($code)
    {
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
                $message = "Oops - something went wrong. [code {$code}]";
                $success = false;
                break;
        }
        $response = array('code' => $code, 'success' => $success, 'message' => $message);
        return new JsonResponse($response);
    }

    //######################################## WRAPPERS ##########################################

    /**
     * Calls the aggregator to process the data received
     *
     * @param array $weekSummary array of data sent by the chrome extension
     *
     * @return integer $code the response code
     */
    protected function _processWeekSummary($weekSummary)
    {
        if (empty($weekSummary)) {
            $code = 300;
        } else {
            /** @var Aggregator $aggregator */
            $aggregator = $this->get('stats.aggregator');
            $code = $aggregator->aggregateWeekSummary($weekSummary);
        }
        return $code;
    }
}
