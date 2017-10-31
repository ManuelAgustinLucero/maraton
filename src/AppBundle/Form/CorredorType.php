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
                        '13-15 años' => '13 a 15',
                        '16-19 años' => '16 a 19',
                        '20-29 años' => '20 a 29',
                        '30-34 años' => '30 a 34',
                        '35-39 años' => '35 a 39',
                        '40-44 años' => '40 a 44',
                        '45-49 años' => '45 a 49',
                        '50-54 años' => '50 a 54',
                        '55-59 años' => '55 a 59',
                        '60-64 años' => '60 a 64',
                        '65-69 años' => '65 a 69',
                        '70 años en adelante' => '70 en adelante',
                    ),
                    'Mujeres' => array(
                        '13-15 años' => '13 a 15',
                        '16-19 años' => '16 a 19',
                        '20-29 años' => '20 a 29',
                        '30-34 años' => '30 a 34',
                        '35-39 años' => '35 a 39',
                        '40-44 años' => '40 a 44',
                        '45-49 años' => '45 a 49',
                        '50-54 años' => '50 a 54',
                        '55-59 años' => '55 a 59',
                        '60 años en adelante' => '60 años en adelante',
                    ),
                )))

            ->add('pais')
            ->add('ciudad')
            ->add('talle')
            ->add('sexo')
            ->add('distancia')
            ->add('tipocarrera',ChoiceType::class, array(
                'choices' => array(
                    'No'=>1,
                    'Si'=>2)
                )
            )
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
