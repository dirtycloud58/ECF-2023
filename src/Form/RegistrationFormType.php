<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Allergy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
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
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'vous acceptez les conditions',
                    ]),
                ],
                'label' => 'J\'accepte les conditions d\'utilisation'
            ])

            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'veuillez saisir votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
