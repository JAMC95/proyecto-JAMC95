<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Camionero;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('fecha_nacimiento', null, [
                'label' => 'Fecha nacimiento '
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