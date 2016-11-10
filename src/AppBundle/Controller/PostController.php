<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;

/**
 * @Route("/post")
 */
class PostController extends Controller
{
    /**
     * @Route("/ajouter", name="ajouter_post")
     */
    public function ajouterAction(Request $request)
    {
        $post = new Post();
        $post->setAuteur($this->getUser());
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('post/ajouter.html.twig', 
            array('form' => $form->createView()));
    }

    /**
     * @Route("/modifier/{slug}", name="modifier_post")
     */
    public function modifierAction(Request $request, Post $post)
    {
        return $this->render('post/modifier.html.twig');
    }

    /**
     * @Route("/supprimer/{slug}", name="ajouter_post", name="supprimer_post")
     */
    public function supprimerAction(Request $request)
    {
        return $this->render('post/supprimer.html.twig');
    }
}
