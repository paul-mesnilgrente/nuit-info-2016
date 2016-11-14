<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;

/**
 * @Route("/media")
 */
class MediaController extends Controller
{
    /**
     * @Route("/ajouter", name="ajouter_media")
     */
    public function ajouterAction(Request $request)
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('media/ajouter.html.twig', 
            array('form' => $form->createView()));
    }

    /**
     * @Route("/modifier/{slug}", name="modifier_media")
     */
    public function modifierAction(Request $request, Image $image)
    {
        $form = $this->createForm(ImageType::class, $image);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('media/modifier.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @Route("/consulter", name="consulter_media")
     */
    public function consulterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('AppBundle:Image')->findAll();

        return $this->render('media/consulter.html.twig',
            array('images' => $images));
    }

    /**
     * @Route("/supprimer/{slug}", name="supprimer_media")
     */
    public function supprimerAction(Request $request, Image $image)
    {
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', "Le imagee a bien été supprimé.");
            return $this->redirect($this->generateUrl('homepage'));
        }
        return $this->render('media/supprimer.html.twig', array(
            'image' => $image,
            'form' => $form->createView()));
    }
}
