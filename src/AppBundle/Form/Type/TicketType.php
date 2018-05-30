<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Camion;
use AppBundle\Entity\Camionero;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Material;
use AppBundle\Entity\Obra;
use AppBundle\Entity\Recipiente;
use AppBundle\Entity\Ticket;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TicketType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('camion', EntityType::class, [
                'class' => Camion::class,
                'label' => 'Camión',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ->add('camionero', EntityType::class, [
                'class' => Camionero::class,
                'label' => 'Camionero',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ->add('empresaTransporte',  EntityType::class, [
                'class' => Empresa::class,
                'label' => 'Empresa de transporte',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'query_builder' => function(EntityRepository $repository) {
                    return  $repository->findAlltCompaniesType();
                }
            ])
            ->add('cliente',  EntityType::class, [
                'class' => Empresa::class,
                'label' => 'Cliente',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'query_builder' => function(EntityRepository $repository) {
                    return  $repository->findAlltClientsType();
                }
            ])
            ->add('obra', EntityType::class, [
                'class' => Obra::class,
                'label' => 'Obra',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ->add('material', EntityType::class, [
                'class' => Material::class,
                'label' => 'Material',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ->add('bruto', null, [
                'label' => 'Bruto '
            ])
            ->add('tara', null, [
                'label' => 'Tara '
            ])
            ->add('tieneRecipiente', null, [
                'label' => '¿Es recipiente?'
            ])
            ->add('tipoRecipiente', EntityType::class, [
                'class' => Recipiente::class,
                'label' => 'Recipiente',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => ['data-select' => 'true']
            ])
            ;


    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
            'admin' => false
        ]);
    }

}