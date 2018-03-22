<?php

declare(strict_types=1);

/*
 * Maxim Falaleev (c) 2018 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostDataFixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setTitle('foobar');
        $post->setBody('hello world');
        $post->setTimestamp(new \DateTime());
        $manager->persist($post);
        $manager->flush();    }
}
