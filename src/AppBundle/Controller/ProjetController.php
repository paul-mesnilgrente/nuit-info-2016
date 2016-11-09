<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/projet")
 */
class ProjetController extends Controller
{
    /**
     * @Route("/", name="projet")
     */
    public function projetAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('projet/projet.html.twig');
    }
}
