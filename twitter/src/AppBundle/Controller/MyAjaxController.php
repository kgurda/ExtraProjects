<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class MyAjaxController extends Controller
{
    public function updatePostAction()
    {
        $request = $this->container->get('request');
        $descrition = $request->get('post_description');

        $response = array("description"=>$descrition);
        return new Response(json_encode($response));
    }
}
