<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Votre nom'
                ]
            ])
            ->add('prenom',textType::class,[
                'attr'=>[
                    'placeholder'=>'votre prenom'
                ]
            ])
            ->add('adresse',textType::class,[
                'attr'=>[
                    'placeholder'=>'votre adresse'
                ]
            ])
            ->add('telephone',textType::class,[
                'attr' =>[
                    'placeholder' =>'votre numero de telephone'
                ]
            ])
            ->add('email',textType::class,[
                'attr' =>[
                    'placeholder' =>'votre email'
           ]
        ])
            ->add('date_de_naissance',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('code_qr')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
