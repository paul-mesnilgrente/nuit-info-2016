<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/defi/jarvis/doc")
 */
class DocJarvisController extends Controller
{
    /**
     * @Route("/presentation", name="doc_presentation_jarvis")
     */
    public function presentationAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('jarvis/doc/presentation.html.twig');
    }

    /**
     * @Route("/utilisateur", name="doc_utilisateur_jarvis")
     */
    public function utilisateurAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('jarvis/doc/utilisateur.html.twig');
    }

    /**
     * @Route("/conception", name="doc_conception_jarvis")
     */
    public function conceptionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('jarvis/doc/conception.html.twig');
    }
}
