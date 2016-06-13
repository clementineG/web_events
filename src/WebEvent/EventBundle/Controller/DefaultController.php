<?php

namespace WebEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render('WebEventEventBundle:Default:index.html.twig', array('user' => $user));
    }
}
