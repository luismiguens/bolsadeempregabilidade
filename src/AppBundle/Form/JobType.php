<?php

namespace AppBundle\Form;

use AppBundle\Utils\Utils;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class JobType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, ['label' => "Titulo"])
                ->add('description', TextareaType::class, ['label' => "Descrição", 'attr' => array('rows' => '20')])
                ->add('area', ChoiceType::class, array(
                    'choices' => array(
                        'Administrativos' => 'Administrativos',
                        'Agência de Viagens' => 'Agência de Viagens',
                        'Animação e Desporto' => 'Animação e Desporto',
                        'Atenção ao Cliente' => 'Atenção ao Cliente',
                        'Aviação / Aeroporto' => 'Aviação / Aeroporto',
                        'Comercial' => 'Comercial',
                        'Compras' => 'Compras',
                        'Consultoria e Formação' => 'Consultoria e Formação',
                        'Cozinha' => 'Cozinha',
                        'Cruzeiros' => 'Cruzeiros',
                        'Direcção' => 'Direcção',
                        'Eventos e Grupos' => 'Eventos e Grupos',
                        'Guia Intérprete' => 'Guia Intérprete',
                        'Manutenção' => 'Manutenção',
                        'Marketing e Relações Públicas' => 'Marketing e Relações Públicas',
                        'Outra' => 'Outra',
                        'Qualidade' => 'Qualidade',
                        'Quartos e Andares' => 'Quartos e Andares',
                        'Recepção' => 'Recepção',
                        'Recursos Humanos' => 'Recursos Humanos',
                        'Reservas' => 'Reservas',
                        'Sala e Bar' => 'Sala e Bar',
                        'SPA e Beleza' => 'SPA e Beleza',
                    ), 'label' => "Área"))
                ->add('location', ChoiceType::class, array(
                    'choices' => array(
                        'Lisboa' => 'Lisboa',
                        'Porto' => 'Porto',
                        'Açores' => 'Açores',
                        'Aveiro' => 'Aveiro',
                        'Beja' => 'Beja',
                        'Braga' => 'Braga',
                        'Bragança' => 'Bragança',
                        'Castelo Branco' => 'Castelo Branco',
                        'Coimbra' => 'Coimbra',
                        'Évora' => 'Évora',
                        'Faro' => 'Faro',
                        'Guarda' => 'Guarda',
                        'Leiria' => 'Leiria',
                        'Madeira' => 'Madeira',
                        'Portalegre' => 'Portalegre',
                        'Santarém' => 'Santarém',
                        'Setúbal' => 'Setúbal',
                        'Viana do Castelo' => 'Viana do Castelo',
                        'Vila Real' => 'Vila Real',
                        'Viseu' => 'Viseu',
                        'Todas a regiões' => 'Todas a regiões',
                        'Anuncio para o estrangeiro' => 'Anuncio para o estrangeiro',
                    ), 'label' => "Localidade"))
                ->add('openings', TextType::class, ['label' => "Vagas"])
                ->add('year', TextType::class, ['label' => "Ano"]);
        //->add('createdAt')
        //->add('business', null, ['label' => "Empresa"])

        $user = $options['user'];

        if (in_array($user->getId(), Utils::DEFAULT_ADMINS)) {
            $builder->add('business', null, ['label' => "Empresa"]);
        } else {
            $builder->add('business', EntityType::class, [
                'class' => 'AppBundle:Business',
                'choices' => $user->getBusiness(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job',
            'user' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_job';
    }

}
