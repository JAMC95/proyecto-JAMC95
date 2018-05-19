<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClientType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombreEmpresa', null, [
            'label' => 'Nombre de la empresa '
        ])
            ->add('nif', null, [
                'label' => 'nif '
            ])
            ->add('direccion', null, [
                'label' => 'Dirección '
            ])
            ->add('telefono', null, [
                'label' => 'Teléfono '
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