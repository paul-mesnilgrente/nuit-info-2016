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
     * @Route("/transformer", name="transformer_post")
     */
    public function transformerAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->request->get('markdown');
        } else {
            $data = "Erreur dans l'usage. La requête doit être en post.";
        }
        $parser = $this->container->get('markdown.parser');
        $html = $parser->transformMarkdown($data);

        return $this->render('post/contenu.html.twig', array(
            'html' => $html));
    }


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
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('post/modifier.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @Route("/consulter/non-publies", name="consulter_non_publies_post")
     */
    public function consulterNonPublies(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findBy(
            array('estPublie' => false),
            array('datePublication' => 'desc'));
        return $this->render('post/consulter-non-publies.html.twig', array(
            'posts' => $posts));
    }

    /**
     * @Route("/supprimer/{slug}", name="supprimer_post")
     */
    public function supprimerAction(Request $request, Post $post)
    {
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', "Le poste a bien été supprimé.");
            return $this->redirect($this->generateUrl('homepage'));
        }
        return $this->render('post/supprimer.html.twig', array(
            'post' => $post,
            'form' => $form->createView()));
    }
}
