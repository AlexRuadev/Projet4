<?php

namespace App\Controller;

use App\Entity\Heritage;
use App\Form\RegistrationFormType;
use App\Security\ConnexionFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\Parents;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */

//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('Parents_pseudo', TextType::class)
//            ->add('plainPassword', RepeatedType::class, array(
//                'type' => PasswordType::class,
//                'first_options'  => array('label' => 'Password'),
//                'second_options' => array('label' => 'Repeat Password'),
//            ))
//        ;
//    }
//
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => Heritage::class,
//        ));
//    }



    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getUser();

        if(!empty($user)){
            return $this->redirectToRoute('landing');
        }
        // 1) build the form
        $user = new Parents();
        $form = $this->createForm(RegistrationFormType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setParentsMdp($password);


            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->render('accueil.html.twig');
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }

}
