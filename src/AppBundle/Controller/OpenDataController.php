<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/defi/open-data")
 */
class OpenDataController extends Controller
{
    /**
     * @Route("/", name="open_data")
     */
    public function projetAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('open-data/index.html.twig');
    }
}
