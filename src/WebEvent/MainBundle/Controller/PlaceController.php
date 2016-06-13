<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 06/10/15
 * Time: 22:40
 */

namespace WebEvent\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PlaceController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $places = $em->getRepository('WebEventMainBundle:Place')->findAll();

        return $this->render('WebEventMainBundle:Place:index.html.twig', array('user' => $user, 'places' => $places, 'city' => 'Paris'));
    }


    public function changeViewAction($city_selected)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $ar_places = $em->getRepository('WebEventMainBundle:Place')->getPlacesByCityName($city_selected);
        return $this->render('WebEventMainBundle:Place:index.html.twig',
            array(
                'user' => $user,
                'city' => ucfirst(strtolower($city_selected)),
                'places' => $ar_places
            )
        );

    }

    /**
     * Finds and displays a Place entity.
     *
     */
    public function showAction($city_selected,$name)
    {
        $em = $this->getDoctrine()->getManager();
        $place_name = str_replace('-', ' ',$name);
        $entity = $em->getRepository('WebEventMainBundle:Place')->findOneByName($place_name);
        return $this->render('WebEventMainBundle:Place:show.html.twig', array(
            'entity' => $entity,
        ));
    }
}