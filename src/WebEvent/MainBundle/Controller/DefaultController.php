<?php

namespace WebEvent\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebEventMainBundle:Default:index.html.twig', array('name' => $name));
    }
}
