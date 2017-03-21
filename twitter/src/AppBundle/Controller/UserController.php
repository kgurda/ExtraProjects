<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if($request->isMethod("POST")) {

            $description = $request->request->get('post_description');
            $post = new Post();
            $post->setDescription($description);
            $now = new \DateTime();
            $post->setDate($now);
            $post->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        }
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findBy(array('user' => $user));
        return array('user' => $user, 'posts' => $posts);
    }

}
