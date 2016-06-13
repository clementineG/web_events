<?php

namespace WebEvent\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebEvent\EventBundle\Entity\Edition;
use WebEvent\EventBundle\Form\Type\EditionType;
use WebEvent\MainBundle\Entity ;
use WebEvent\MainBundle\Entity\LinkType;
use Symfony\Component\HttpFoundation\Request;



class EventController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Event form
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('WebEventEventBundle:Event')->findAll();
        return $this->render('WebEventBackOfficeBundle:Event:index.html.twig', array('user' => $user, 'events' => $events));
    }
    /**
     * Displays a form to create a new Company entity.
     *
     */
    public function newAction()
    {
        $entity = new Edition();
        $form   = $this->createCreateForm($entity);


        return $this->render('WebEventBackOfficeBundle:Event:new.html.twig', array(
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
    private function createCreateForm(Edition $entity)
    {

        $form = $this->createForm(new EditionType(), $entity, array(
            'action' => $this->generateUrl('web_event_backofficebundle_event_create'),
            'method' => 'POST'
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
        $entity = new Edition();

        $form = $this->createCreateForm($entity);

        $form->handleRequest($request);
        $event = $entity->getEvent();

        $em = $this->getDoctrine()->getManager();
        $em->persist($event);

        if (isset($form)) {

            $address= $entity->getAddress();

            if(empty($address)){
                $place= $entity->getPlace();
                $address=$em->getRepository('WebEventMainBundle:Address')->findOneBy(array('id'=>$place->getId()));
            }
            $coords = $address->setCoords();

            $address->setLatitude($coords['latitude']);
            $address->setLongitude($coords['longitude']);
            $em->persist($address);


            if($cover = $entity->getCover()) {
                $entity->name = 'edition_cover';
                $em->persist($cover);
            }

            $em->persist($entity);
            $em->flush();

        }

        return $this->redirect($this->generateUrl('web_event_backofficebundle_event'));
    }
}
