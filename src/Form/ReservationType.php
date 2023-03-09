<?php

namespace App\Form;

use App\Entity\Hour;
use App\Entity\Allergy;
use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReservationType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hourString = str_pad($i, 2, '0', STR_PAD_LEFT);
            for ($j = 0; $j < 60; $j += 15) {
                $minuteString = str_pad($j, 2, '0', STR_PAD_LEFT);
                $hours["$hourString:$minuteString"] = "$hourString:$minuteString";
            }
        }

        $builder
            ->add('guests', ChoiceType::class, [
                'choices' => array_combine(range(1, 18), range(1, 18))
            ])
            ->add('email', EmailType::class)
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
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datepicker',

                ],
            ])
            ->add('hour', ChoiceType::class, [
                'label' => 'Heure',
                'choices' => $hours,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
