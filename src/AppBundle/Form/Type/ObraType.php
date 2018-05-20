<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Obra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ObraType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombreObra', null, [
            'label' => 'Nombre '
        ])
            ->add('direccion', null, [
                'label' => 'Dirección '
            ])
            ->add('telefonoencargado', null, [
                'label' => 'Teléfono '
            ]);



    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Obra::class,
            'admin' => false
        ]);
    }

}