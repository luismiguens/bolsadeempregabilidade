<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', \Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label'=>'Nome'])
                ->add('phone', \Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label'=>'Telefone'])
                ->add('linkedin', \Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label'=>'LinkdIn'])
//                ->add('cv')
                ->add('cvFile', VichFileType::class, [
                    'label' => 'Curriculo',
                    'required' => false,
                    'allow_delete' => true,
                    'download_uri' => true,
                    'download_label' => 'Click para Download do Curriculo',
                ]);
//                ->add('business')
//                ->add('jobs');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
