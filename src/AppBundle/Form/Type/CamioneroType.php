<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Camionero;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CamioneroType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombreCamionero', null, [
            'label' => 'Nombre '
        ])
            ->add('dni', null, [
                'label' => 'DNI '
            ])
            ->add('direccion', null, [
                'label' => 'Dirección '
            ])
            ->add('fecha_nacimiento', DateType::class, [ 'label' => 'Fecha de nacimiento',
                'input'  => 'datetime',
                'widget' => 'choice',
                'format' => 'ddMMyyyy',
                'placeholder' => array(
                    'year' => 'Año', 'month' => 'Mes', 'day' => 'Día',

                )
            ])
            ->add('telefono', null, [
                'label' => 'Teléfono '
            ]);



    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Camionero::class,
            'admin' => false
        ]);
    }

}