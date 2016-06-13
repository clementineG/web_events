<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 02/10/15
 * Time: 08:50
 */

namespace WebEvent\FrontOfficeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $events = $em->getRepository('WebEventEventBundle:Event')->findAll();
        $categories = $em->getRepository('WebEventEventBundle:EventCategory')->findAll();

        return $this->render('WebEventFrontOfficeBundle:Home:index.html.twig', array('user' => $user, 'events' => $events, 'categories' => $categories));
    }

}
