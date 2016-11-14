<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{slug}", name="voir_post")
     */
    public function voirAction(Request $request, Post $post)
    {
        $parser = $this->container->get('markdown.parser');
        $html = $parser->transformMarkdown($post->getContenu());
        $post->setContenu($html);
        
        return $this->render('post/voir.html.twig', array(
            'post' => $post));
    }

    /**
     * @Route("/feed.rss", name="feed_blog")
     */
    public function feedAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findBy(
            array('estPublie' => true),
            array('datePublication' => 'desc'),
            10);

        $feed = $this->get('eko_feed.feed.manager')->get('post');
        $feed->addFromArray($posts);

        $content = $feed->render('rss');
        return $this->render('post/feed.twig', array(
            'content' => $content));
    }
}
