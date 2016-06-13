<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 12/09/15
 * Time: 17:34
 */

namespace WebEvent\MainBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class DocumentType  extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('files', 'file', array(
                'multiple' => true,
                'data_class' => null,
            ));
    }

    public function getName()
    {
        return 'file';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebEvent\MainBundle\Entity\Document',
        ));
    }
}