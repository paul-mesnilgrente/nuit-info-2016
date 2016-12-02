<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/defi/jarvis")
 */
class JarvisController extends Controller
{
    /**
     * @Route("/", name="jarvis")
     */
    public function projetAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('jarvis/index.html.twig');
    }
}
