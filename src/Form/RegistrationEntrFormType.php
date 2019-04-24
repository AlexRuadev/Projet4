<?php

namespace App\Form;

use App\Entity\Entreprises;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationEntrFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Entreprises_pseudo', TextType::class, [
                'label' => false,
                'attr' => array('placeholder' => 'Pseudo'),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un pseudo'
                    ])

                ]
            ])
            ->add('Entreprises_mail', EmailType::class, [
                'label' => false,
                'attr' => array('placeholder' => 'Email'),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un mail'
                    ])
                ]
            ])
            ->add('EntreprisesMdp', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => false ,'attr' => array('placeholder' => 'Mot de passe')),
                'second_options' => array('label' => false ,'attr' => array('placeholder' => 'Confirmation')),
            ))
            ->add('Entreprises_nom', TextType::class,[
                'attr' => array('placeholder' => 'Nom'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un nom'
                    ])
                ]
            ])
            ->add('Entreprises_effectifs', IntegerType::class, [
                'attr' => array('placeholder' => 'Effectifs'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre effectif'
                    ])
                ]
            ])
            ->add('Entreprises_adresse', TextType::class, [
                'attr' => array('placeholder' => 'Adresse'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une adresse'
                    ])
                ]
            ])
            ->add('Entreprises_cp', IntegerType::class, [
                'attr' => array('placeholder' => 'Code postal'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre Code Postal'
                    ])
                ]
            ])
            ->add('Entreprises_ville', TextType::class, [
                'attr' => array('placeholder' => 'Ville'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une ville'
                    ])
                ]
            ])
            ->add('Entreprises_telephone', TextType::class, [
                'attr' => array('placeholder' => 'Telephone'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un telephone'
                    ])
                ]
            ])
            ->add('Entreprises_siret', IntegerType::class, [
                'attr' => array('placeholder' => 'Email'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un numéro de Siret'
                    ]),
//                    new Length([
//                        'min' => 14,
//                        'minMessage' => 'Votre Siret doit avoir {{ limit }} characters',
//                        'max' => 14,
//                    ]),
                ]
            ])
            ->add('Entreprises_description', TextType::class, [
                'attr' => array('placeholder' => 'Description'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une description'
                    ])
                ]
            ])
            ->add('Entreprises_horaires', TextType::class, [
                'attr' => array('placeholder' => 'horaires'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner vos horaires'
                    ])
                ]
            ])
            ->add('Entreprises_capacite', IntegerType::class, [
                'attr' => array('placeholder' => 'Email'),
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre capacité'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprises::class,
        ]);
    }
}
