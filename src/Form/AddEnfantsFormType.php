<?php

namespace App\Form;

//use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\Enfants;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AddEnfantsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Enfants_prenom', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un prenom'
                    ])
                ]
            ])
            ->add('Enfants_nom', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un nom'
                    ])
                ]
            ])
            ->add('Enfants_date_de_naissance', DateType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une date de naissance'
                    ])
                ]
            ])
            ->add('Enfants_information', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner des informations'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Enfants::class,
        ));
    }
}
