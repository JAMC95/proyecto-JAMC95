<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Camion;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Obra;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TransportCompanyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombreEmpresa', null, [
            'label' => 'Nombre de la empresa '
        ])
            ->add('nif', null, [
                'label' => 'NIF '
            ])
            ->add('direccion', null, [
                'label' => 'Dirección '
            ])
            ->add('telefono', null, [
                'label' => 'Teléfono '
            ])
            ->add('obras',  EntityType::class, [
                'class' => Obra::class,
                'label' => 'Obras',
                'expanded' => false,
                'multiple' => true,
                'required' => false
            ]);



    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
            'admin' => false
        ]);
    }

}