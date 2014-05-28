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
            ->add('secondName')
            ->add('firstName')
            ->add('patronymic')
            ->add('birthday', 'date')
            ->add('careerBeggining', 'date')
            ->add('email')
            ->add('phoneNumber')
            ->add('address')
            ->add('technologyUsed')
            ->add('projects')
            ->add('submit', 'submit')
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
