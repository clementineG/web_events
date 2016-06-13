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


class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url');

    }

    public function getName()
    {
        return 'link';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebEvent\MainBundle\Entity\Link',
        ));
    }
}