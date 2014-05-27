<?php

namespace WebKate\Bundle\TestTaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExecutorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('secondName', 'text', array('label' => 'Secondname'))
            ->add('firstName', 'text', array('label' => 'Firstname'))
            ->add('patronymic', 'text', array('label' => 'Patronymic'))
            ->add('birthday', 'date', array('label' => 'Birthday'))
            ->add('careerBeggining', 'date', array('label' => 'Career beginning'))
            ->add('email', 'email', array('label' => 'Email'))
            ->add('phoneNumber', 'text', array('label' => 'Phone number'))
            ->add('address', 'text', array('label' => 'Address'))
            ->add('technologyUsed', 'text', array('label' => 'The technologies used'))
            ->add('submit', 'submit', array('label' => 'Submit'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebKate\Bundle\TestTaskBundle\Entity\Executor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webkate_bundle_testtaskbundle_executor';
    }
}
