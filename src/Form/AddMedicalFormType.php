<?php
/**
 * Created by PhpStorm.
 * User: Batou
 * Date: 25/04/2019
 * Time: 15:09
 */

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\Enfants;
use App\Entity\Medical;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AddMedicalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Medical_regime', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner des informations'
                    ])
                ]
            ])
            ->add('Medical_traitement', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner des informations'
                    ])
                ]
            ])
            ->add('Medical_allergie', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner des informations'
                    ])
                ]
            ])
            ->add('Medical_handicap', TextType::class, [
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