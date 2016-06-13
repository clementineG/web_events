<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 10/09/15
 * Time: 21:20
 */

namespace WebEvent\BackOfficeBundle\Controller;


use WebEvent\EventBundle\Entity\EventCategory;
use WebEvent\EventBundle\Form\Type\EventCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EventCategoryController extends Controller{

    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Event form
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('WebEventEventBundle:EventCategory')->findAll();
        return $this->render('WebEventBackOfficeBundle:EventCategory:index.html.twig', array('user' => $user, 'categories' => $categories));
    }
    /**
     * Displays a form to create a new Company entity.
     *
     */
    public function newAction()
    {
        $entity = new EventCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebEventBackOfficeBundle:EventCategory:new.html.twig', array(
            'event_category' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Creates a form for EventCategory entity.
     *
     * @param EventCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EventCategory $entity)
    {

        $form = $this->createForm(new EventCategoryType(), $entity, array(
            'action' => $this->generateUrl('web_event_backofficebundle_event_category_create'),
            'method' => 'POST'
        ));


        $form->add('submit', 'submit', array('label' => 'Créer','attr'=>array('class'=>'btn btn-success pull-left button-valid-form')));

        return $form;
    }

    /**
     * Creates a new EventCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EventCategory();

        $form = $this->createCreateForm($entity);

        $form->handleRequest($request);


        $em = $this->getDoctrine()->getManager();

        if (isset($form)) {
            $em->persist($entity);
            $em->flush();

        }

        return $this->redirect($this->generateUrl('web_event_backofficebundle_event_category'));
    }
} 