<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorredorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('fechaNacimiento')
            ->add('email')
            ->add('telefono')
            ->add('telEmergencia')
            ->add('pais')
            ->add('ciudad')
            ->add('talle')
            ->add('sexo')
            ->add('distancia')
            ->add('tipocarrera')
            ->add('formapago')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Corredor'
        ));
    }
}
