<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 26/07/15
 * Time: 23:58
 */
namespace WebEvent\MainBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use WebEvent\MainBundle\Form\Type\AddressType;
use WebEvent\MainBundle\Form\Type\PlacePictureType;


class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('description');
        $builder->add('address', new AddressType());
        $builder->add('facebook');
        $builder->add('twitter');
        $builder->add('website');
//        $builder->add('file', new PlacePictureType());

    }

    public function getName()
    {
        return 'place';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebEvent\MainBundle\Entity\Place',
        ));
    }
}