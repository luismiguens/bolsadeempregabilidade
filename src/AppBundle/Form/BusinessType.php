<?php

namespace AppBundle\Form;

use LogicException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BusinessType extends AbstractType {
//    private $security;
//
//    public function __construct(Security $security) {
//        $this->security = $security;
//    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', TextType::class, ['label' => "Nome"])
                ->add('taxName', TextType::class, ['label' => "Nome Fiscal", 'required' => false])
                ->add('address', TextType::class, ['label' => "Morada", 'required' => false])
                ->add('nif', TextType::class, ['label' => "Número Fiscal", 'required' => false])
                ->add('contact', TextType::class, ['label' => "Contacto", 'required' => false])
                ->add('representatives', TextType::class, ['label' => "Representantes", 'required' => false])
                ->add('presentation', TextareaType::class, ['label' => "Apresentação", 'required' => false])
                ->add('email', EmailType::class, ['label' => "Email", 'required' => false])
                ->add('phone', TelType::class, ['label' => "Telefone", 'required' => false])
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
                ->add('years', null, ['label' => "Edições", 'required' => false]);


        $user = $options['user'];

        if (in_array($user->getId(), \Utils::DEFAULT_ADMINS)) {
            $builder->add('users', null, ['label' => 'Administradores', 'required' => false]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Business',
            'user' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_business';
    }

}
