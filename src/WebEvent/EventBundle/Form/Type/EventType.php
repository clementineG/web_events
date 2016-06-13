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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
         $builder->add('short_description');
        $builder->add('event_category', 'entity', array(
            'class' => 'WebEventEventBundle:EventCategory',
            'property' => 'name',
            'multiple' =>false,
            'expanded'=> false ,
            'required' => false,
        ));
    }

    public function getName()
    {
        return 'event';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebEvent\EventBundle\Entity\Event',
        ));
    }
}