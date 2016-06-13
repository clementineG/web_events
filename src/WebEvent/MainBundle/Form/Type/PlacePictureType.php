<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 29/10/2015
 * Time: 19:47
 */
namespace WebEvent\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WebEvent\MainBundle\Entity\Place;

class PlacePictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file');
    }
    public function getName()
    {
        return 'webevent_mainbundle_placepicturetype';
    }
}