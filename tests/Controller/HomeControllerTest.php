<?php

namespace App\Controller;

use App\DataFixtures\PostDataFixture;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function setUp()
    {
        $this->em = $this->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->loadFixtures([
            PostDataFixture::class,
        ]);
    }

    public static function getPhpUnitXmlDir()
    {
        return dirname(__DIR__);
    }

    public function testInitial()
    {
        $posts = $this->em->getRepository(Post::class)->findAll();
        $this->assertCount(1, $posts);
    }

    public function testIndex()
    {
        $client = $this->makeClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    public function testAddPost()
    {
        $client = $this->makeClient();
        $client->request('GET', '/add');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPostSingle()
    {
        $this->assertTrue(true);
        $client = $this->makeClient();
        $client->request('GET', '/post/');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
