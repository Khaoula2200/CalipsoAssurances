<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nom',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control w-50',
                        'minlenght' => '2',
                        'maxlenght' => '50',
                    ],
                    'label' => 'Nom',
                    'label_attr' => [
                        'class' => 'form-label  mt-4'
                    ]
                ]
            )
            ->add(
                'prenom',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control w-50',
                        'minlenght' => '2',
                        'maxlenght' => '50',
                    ],
                    'label' => 'Prénom',
                    'label_attr' => [
                        'class' => 'form-label  mt-4'
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'attr' => [
                        'class' => 'form-control w-50',
                        'minlenght' => '2',
                        'maxlenght' => '180',
                    ],
                    'label' => 'Adresse email',
                    'label_attr' => [
                        'class' => 'form-label  mt-4'
                    ],
                  
                ]
            )
            // ->add(
            //     'telephone',
            //     TextType::class,
            //     [
            //         'attr' => [
            //             'class' => 'form-control',
            //         ],
            //         'required'=>false,
            //         'label' => 'Telephone',
            //         'label_attr' => [
            //             'class' => 'form-label  mt-4'
            //         ]
            //     ]
            // )

            // ->add(
            //     'adress',
            //     TextType::class,
            //     [
            //         'attr' => [
            //             'class' => 'form-control',
            //         ],
            //         'required'=>false,
            //         'label' => 'Adresse',
            //         'label_attr' => [
            //             'class' => 'form-label  mt-4'
            //         ]
            //     ]
            // )
        
            ->add('destinataire', ChoiceType::class, [
                'choices'  => [
                    'Nourdine EL KASSIMI' => 'nouredine.kassimi@calipso-assurances.fr',
                    'Les ressources humains' => 'hr@gmail.com',
                ],
                'placeholder' => 'Choisir',
                'attr' => [
                    'class' => 'form-control w-50',
                ],
                'label' => 'Destinataire',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ]
            ])
            ->add(
                'message',
                TextAreaType::class,
                [
                    'attr' => [
                        'class' => 'form-control w-50',
                    ],
                    'label' => 'Message',
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ],
                  
                ]
            )
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
