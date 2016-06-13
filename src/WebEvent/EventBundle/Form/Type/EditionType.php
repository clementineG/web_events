<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 26/07/15
 * Time: 23:58
 */
namespace WebEvent\EventBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use WebEvent\MainBundle\Form\Type\DocumentType;
use WebEvent\MainBundle\Form\Type\AddressType;
use WebEvent\MainBundle\Form\Type\LinkType;

class EditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('event', new EventType());

        $builder->add('start','datetime',array(
            'data' => new \DateTime()));
        $builder->add('end','datetime', array(
            'data' => new \DateTime()));

        $builder->add('price');
        $builder->add('title');
        $builder->add('h1');
        $builder->add('h2');
        $builder->add('description', 'textarea');
        $builder->add('place', 'entity', array(
            'class' => 'WebEventMainBundle:Place',
            'property' => 'name',
                'multiple' =>false,
                'expanded'=> false ,
                'required' => false,
            ));
        $builder->add('address', new AddressType(),array('required' => false));
        $builder->add('link', new LinkType());
        $builder->add('cover', new DocumentType());

    }

    public function getName()
    {
        return 'editions';
    }

    /*public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebEvent\EventBundle\Entity\Edition',
        ));
    }*/
}