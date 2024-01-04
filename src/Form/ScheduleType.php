<?php

namespace App\Form\Type;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('weekdays', ChoiceType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control'],
            'placeholder' => 'Jour',
            'choices' => Schedule::DAYS,
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez selectionner un jour.',
                ]),
            ],
        ])
        ->add('openingHours', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez selectionner une heure d\'ouverture.',
                ]),
            ],
        ])
        ->add('closingHours', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez selectionner une heure de fermeture.',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
