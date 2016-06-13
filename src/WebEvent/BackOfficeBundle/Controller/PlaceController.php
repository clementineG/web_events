<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 23/08/15
 * Time: 18:50
 */

namespace WebEvent\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebEvent\MainBundle\Entity\Place;
use WebEvent\MainBundle\Form\Type\PlaceType;
use WebEvent\MainBundle\Form\AddressType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class PlaceController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Event form
        $em = $this->getDoctrine()->getManager();

        $places = $em->getRepository('WebEventMainBundle:Place')->findAll();
        return $this->render('WebEventBackOfficeBundle:Place:index.html.twig', array('user' => $user, 'places' => $places));
    }
    /**
     * Displays a form to create a new Company entity.
     *
     */
    public function newAction()
    {
        $entity = new Place();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebEventBackOfficeBundle:Place:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Creates a form to create a Company entity.
     *
     * @param Company $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Place $entity)
    {
        $form = $this->createForm(new PlaceType(), $entity, array(
            'action' => $this->generateUrl('web_event_backofficebundle_place_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer','attr'=>array('class'=>'btn btn-success pull-left button-valid-form')));

        return $form;
    }

    /**
     * Creates a new Company entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Place();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if (isset($form)) {

            $address = $entity->getAddress();

            if($address){
                $coords = $address->setCoords();

                $address->setLatitude($coords['latitude']);
                $address->setLongitude($coords['longitude']);
                $em->persist($address);
            }
            $entity->uploadPicture();

            $em->persist($entity);
            $em->flush();

        }

        return $this->redirect($this->generateUrl('web_event_backofficebundle_place'));
    }
}
