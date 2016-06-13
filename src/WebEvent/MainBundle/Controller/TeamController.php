<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 06/10/15
 * Time: 23:18
 */

namespace WebEvent\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TeamController extends Controller{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render('WebEventMainBundle:Team:index.html.twig', array('user' => $user));
    }

}
