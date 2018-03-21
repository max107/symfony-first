<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = $this->createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    public function testAddPost()
    {
        $this->assertTrue(true);
    }

    public function testPostSingle()
    {
        $this->assertTrue(true);
    }
}
