<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testIndex()
    {

        $this->client->request('GET', '/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }

    public function testAddPost()
    {
//        $client = $this->createClient();
        $this->client->request('GET', '/add');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testPostSingle()
    {
        $this->assertTrue(true);
        $this->client->request('GET', '/post/');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }

    public function tearDown()
    {
        $this->client = null;
    }
}
