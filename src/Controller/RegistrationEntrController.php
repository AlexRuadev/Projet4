<?php

namespace App\Controller;

use App\Entity\Heritage;
use App\Form\RegistrationEntrFormType;
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
use App\Entity\Entreprises;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationEntrController extends AbstractController
{
    /**
     * @Route("/registerentr", name="app_registerentr")
     */
    public function registerentr(Request $request, UserPasswordEncoderInterface $passwordEncoder , \Swift_Mailer $mailer)
    {
        // 1) build the form
        $user = new Entreprises();
        $form = $this->createForm(RegistrationEntrFormType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)


            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setEntreprisesMdp($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            ;
            $message = (new \Swift_Message('Demande de souscription'))
                ->setFrom('kidsery76@gmail.com')
                ->setTo('kidsery76@gmail.com')
                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'registration_entr/registration.html.twig',[
                        'name' => $user->getEntreprisesPseudo(),
                        'nom' => $user->getEntreprisesNom(),
                        'effectifs' => $user->getEntreprisesEffectifs(),
                        'adresse' => $user->getEntreprisesAdresse(),
                        'cp' => $user->getEntreprisesCp(),
                        'ville' => $user->getEntreprisesVille(),
                        'telephone' => $user->getEntreprisesTelephone(),
                        'siret' => $user->getEntreprisesSiret(),
                        'description' => $user->getEntreprisesDescription(),
                        'horaires' => $user->getEntreprisesHoraires(),
                        'capacite' => $user->getEntreprisesCapacite(),
            ]),
                    'text/html'
                )
                /*
                 * If you also want to include a plaintext version of the message
                ->addPart(
                    $this->renderView(
                        'emails/registration.txt.twig',
                        ['name' => $name]
                    ),
                    'text/plain'
                )
                */
            ;

            $mailer->send($message);

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->render('accueil.html.twig');
        }

        return $this->render(
            'registration_entr/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
