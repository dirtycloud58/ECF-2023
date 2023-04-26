<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Allergy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('guests', ChoiceType::class, [
                'choices' => array_combine(range(1, 18), range(1, 18))
            ])
            ->add('allergies', EntityType::class, [
                'class' => Allergy::class,
                'multiple' => true,
                'required' => false,
                'choice_label' => 'name',
                'by_reference' => false,
                'attr' => [
                    'class' => 'selectAllergys'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
