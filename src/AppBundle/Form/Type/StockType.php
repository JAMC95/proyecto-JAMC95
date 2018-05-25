<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Material;
use AppBundle\Entity\Recipiente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class StockType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cantidad', null, [
            'label' => 'Cantidad: '
        ]);

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipiente::class,
            'admin' => false
        ]);
    }

}