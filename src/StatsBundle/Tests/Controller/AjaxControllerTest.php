<?php

namespace StatsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AjaxControllerTest extends WebTestCase
{
    public function testPushmatchdetails()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pushMatchDetails');
    }

    public function testPushweeksummary()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pushWeekSummary');
    }

    public function testGetplayerinsight()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getPlayerInsight');
    }

    public function testGetteaminsight()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getTeamInsight');
    }

}
