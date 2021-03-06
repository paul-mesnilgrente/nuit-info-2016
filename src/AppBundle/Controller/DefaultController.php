<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findBy(
            array('estPublie' => true),
            array('datePublication' => 'desc'));
        $parser = $this->container->get('markdown.parser');
        foreach ($posts as $post) {
            $html = $parser->transformMarkdown($post->getContenu());
            $post->setContenu($html);
            $html = $parser->transformMarkdown($post->getAbstract());
            $post->setAbstract($html);
        }

        return $this->render('default/index.html.twig',
            array('posts' => $posts));
    }

    /**
     * @Route("/equipe", name="equipe")
     */
    public function equipeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/equipe.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/contact.html.twig');
    }
}
