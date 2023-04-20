<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReservationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $openingHours = $options['openingHours'];

        $builder
            ->add('email', EmailType::class)
            ->add('guests', ChoiceType::class, [
                'label' => 'Nombre de convives',
                'choices' => array_combine(range(1, 18), range(1, 18))
            ])
            ->add('allergies', EntityType::class, [
                'class' => Allergy::class,
                'by_reference' => false,
                'choice_label' => 'name',
                'required' => false,
                'multiple' => true,
                'expanded' => false,
                'attr' => [
                    'class' => 'selectAllergys'
                ]
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text'
            ])

            ->add('hour', ChoiceType::class, [
                'label' => 'Heure d\'ouverture',
                'choices' => $openingHours,

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'openingHours' => [],
        ]);
    }
}
