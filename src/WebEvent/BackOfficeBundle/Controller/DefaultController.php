<?php

namespace WebEvent\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebEvent\MainBundle\Entity ;
//use Symfony\Component\EventDispatcher\Event;
use WebEvent\EventBundle\Entity\Event;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render('WebEventBackOfficeBundle:Default:index.html.twig',array('user' => $user));
    }
}
