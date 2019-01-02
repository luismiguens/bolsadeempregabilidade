<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class JobType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, ['label'=>"Titulo"] )
                ->add('description', TextareaType::class, ['label'=>"Descrição"])
                ->add('area', TextType::class, ['label'=>"Área"] )
                ->add('location', TextType::class, ['label'=>"Localidade"] )
                ->add('openings', TextType::class, ['label'=>"Vagas"] )
                //->add('createdAt')
                ->add('business', null, ['label'=>"Empresa"] )
//                ->add('users', null, ['label'=>"Participantes"])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_job';
    }


}
