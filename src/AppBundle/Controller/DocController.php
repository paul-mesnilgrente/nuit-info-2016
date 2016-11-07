<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/doc")
 */
class DocController extends Controller
{
    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentationAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('doc/presentation.html.twig');
    }

    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function utilisateurAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('doc/utilisateur.html.twig');
    }

    /**
     * @Route("/conception", name="conception")
     */
    public function conceptionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('doc/conception.html.twig');
    }
}
