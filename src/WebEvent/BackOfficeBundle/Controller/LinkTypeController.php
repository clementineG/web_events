<?php

namespace WebEvent\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebEvent\MainBundle\Entity ;
use WebEvent\EventBundle\Entity\Event;
use WebEvent\EventBundle\Form\Type\EventType;
use WebEvent\MainBundle\Entity\LinkCategory;
use WebEvent\MainBundle\Form\Type\LinkCategoryType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class LinkTypeController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WebEventMainBundle:LinkCategory')->findAll();
        return $this->render('WebEventBackOfficeBundle:LinkType:index.html.twig', array('user' => $user, 'linkcategories' =>$categories));
    }
    /**
     * Displays a form to create a new Company entity.
     *
     */
    public function newAction()
    {
        $entity = new LinkCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebEventBackOfficeBundle:LinkType:new.html.twig', array(
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
    private function createCreateForm(LinkCategory $entity)
    {
        $form = $this->createForm(new LinkCategoryType(), $entity, array(
            'action' => $this->generateUrl('web_event_backofficebundle_linktype_create'),
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
        $entity = new LinkCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();


        $em->persist($entity);
        $em->flush();
        //return $this->redirect($this->generateUrl('web_event_backofficebundle_linktype'));

        return $this->render('WebEventBackOfficeBundle:LinkType:index.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}
