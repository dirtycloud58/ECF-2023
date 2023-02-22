<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;


class ReservationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('guests', TextType::class)
            ->add('email', TextType::class)
            ->add('allergies', EntityType::class, [
                'class' => Allergy::class,
                'by_reference' => false,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'attr' => [
                    'class' => 'selectAllergys'
                ]
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',

            ])
            ->add('hour', TimeType::class, [
                'widget' => 'single_text',

            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
