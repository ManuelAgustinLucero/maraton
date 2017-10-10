<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CorredorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('fechaNacimiento','Symfony\Component\Form\Extension\Core\Type\DateTimeType', array(
                'widget' => 'single_text',
                'html5' => false,))
            ->add('email')
            ->add('telefono')
            ->add('telEmergencia')
            ->add('rangedate',ChoiceType::class, array(
                'choices' => array(
                    'Hombres' => array(
                        '' => null,
                        '13-15 años' => '13 años a 15 años',
                        '16-19 años' => '16 años a 19 años',
                        '20-29 años' => '20 años a 29 años',
                        '30-34 años' => '30 años a 34 años',
                        '35-39 años' => '35 años a 39 años',
                        '40-44 años' => '40 años a 44 años',
                        '45-49 años' => '45 años a 49 años',
                        '50-54 años' => '50 años a 54 años',
                        '55-59 años' => '55 años a 59 años',
                        '60-64 años' => '60 años a 64 años',
                        '65-69 años' => '65 años a 69 años',
                        '70 años en adelante' => '70 años en adelante',
                    ),
                    'Mujeres' => array(
                        '13-15 años' => '13 años a 15 años',
                        '16-19 años' => '16 años a 19 años',
                        '20-29 años' => '20 años a 29 años',
                        '30-34 años' => '30 años a 34 años',
                        '35-39 años' => '35 años a 39 años',
                        '40-44 años' => '40 años a 44 años',
                        '45-49 años' => '45 años a 49 años',
                        '50-54 años' => '50 años a 54 años',
                        '55-años' => '55 años a 59 años',
                        '60 años en adelante' => '60 años en adelante',
                    ),
                )))

            ->add('pais')
            ->add('ciudad')
            ->add('talle')
            ->add('sexo')
            ->add('distancia')
            ->add('tipocarrera')
            ->add('formapago');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Corredor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_corredor';
    }


}
