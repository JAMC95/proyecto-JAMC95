<?php


namespace AppBundle\Form\Type;

use AppBundle\Entity\Camion;
use AppBundle\Entity\Camionero;
use AppBundle\Entity\Empresa;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CamionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matricula', null, [
            'label' => 'Matrícula '
        ])
            ->add('matricularemolque', null, [
                'label' => 'Matrícula del remolque '
            ])
            ->add('marca', null, [
                'label' => 'Marca '
            ])
            ->add('modelo', null, [
                'label' => 'Modelo '
            ])
            ->add('tara', null, [
                'label' => 'Tara '
            ])
          ->add('camioneroHabitual', EntityType::class, [
                'class' => Camionero::class,
                'label' => 'Camionero habitual',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ->add('empresaTransportes',  EntityType::class, [
                'class' => Empresa::class,
                'label' => 'Empresa de transporte',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'query_builder' => function(EntityRepository $repository) {
                    return  $repository->findAlltCompaniesType();
                }
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Camion::class,
            'admin' => false
        ]);
    }

}