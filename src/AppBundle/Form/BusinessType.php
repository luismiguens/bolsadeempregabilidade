<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class BusinessType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', TextType::class, ['label' => "Nome"])
                ->add('taxName', TextType::class, ['label' => "Nome Fiscal"])
                ->add('address', TextType::class, ['label' => "Morada"])
                ->add('nif', TextType::class, ['label' => "Número Fiscal"])
                ->add('contact', TextType::class, ['label' => "Contacto"])
                ->add('representatives', TextType::class, ['label' => "Representantes"])
                ->add('presentation', TextareaType::class, ['label' => "Apresentação"])
                ->add('email', EmailType::class, ['label' => "Email"])
                ->add('phone', TelType::class, ['label' => "Telefone"])
                ->add('website', UrlType::class, ['label' => "Website"])
                //->add('image')
                ->add('imageFile', VichImageType::class, ['required' => false,
                    'label' => "Logotipo",
                    'allow_delete' => true,
                    'download_link' => true])
                //->add('outdoor')
                ->add('outdoorFile', VichImageType::class, ['required' => false,
                    'label' => "Outdoor",
                    'allow_delete' => true,
                    'download_link' => true])
                //->add('updatedAt')
                ->add('years', null, ['label' => "Edições"])
                //->add('jobs')
                ->add('users', null, ['label' => 'Administradores']);
    }

/**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Business'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_business';
    }

}
