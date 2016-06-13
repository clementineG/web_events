<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 06/10/15
 * Time: 22:40
 */

namespace WebEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EventsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $editions = $em->getRepository('WebEventEventBundle:Edition')->findAll();

        return $this->render('WebEventEventBundle:Events:index.html.twig', array('user' => $user, 'editions' => $editions));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $entity = $em->getRepository('WebEventEventBundle:Edition')->find($id);
//        $editions = $entity->getEditions();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find event entity.');
        }

        return $this->render('WebEventEventBundle:Events:show.html.twig', array(
            'entity' => $entity,
            'user' => $user,
//            'editions' => $editions
//            'delete_form' => $deleteForm->createView(),
        ));
    }
}