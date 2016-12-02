<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/defi/open-data/doc")
 */
class DocOpenDataController extends Controller
{
    /**
     * @Route("/presentation", name="doc_presentation_opendata")
     */
    public function presentationAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('open-data/doc/presentation.html.twig');
    }

    /**
     * @Route("/utilisateur", name="doc_utilisateur_opendata")
     */
    public function utilisateurAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('open-data/doc/utilisateur.html.twig');
    }

    /**
     * @Route("/conception", name="doc_conception_opendata")
     */
    public function conceptionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('open-data/doc/conception.html.twig');
    }
}
