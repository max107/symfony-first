<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts
        ]);
    }

    public function addPost(Request $request, PostRepository $postRepository) {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post, [
            'method' => 'POST'
        ]);

        $form->add('submit', SubmitType::class, [
            'label' => 'Add post'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('add-post/index.html.twig', [
            'controller_name' => 'HomeController:addPost',
            'form' => $form->createView(),
        ]);
    }

    public function postSingle($pid, PostRepository $postRepository) {
        $post = $postRepository->find($pid);

        if (null === $post) {
            throw $this->createNotFoundException('404 page not found!');
        }

        return $this->render('post/index.html.twig', [
            'controller_name' => 'HomeController:postSingle',
            'post' => $post
        ]);

    }
}
