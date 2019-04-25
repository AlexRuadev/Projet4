<?php
/**
 * Created by PhpStorm.
 * User: Batou
 * Date: 25/04/2019
 * Time: 15:10
 */

namespace App\Controller;

use App\Entity\Heritage;
use App\Form\AddMedicalFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\Enfants;
use App\Entity\Parents;
use App\Entity\Medical;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class MedicalController extends AbstractController
{
    /**
     * @Route("/profil-enfant-medical/{id}", name="profilmedical")
     */
    public function index($id)
    {
        $medical =  $this->getDoctrine()
            ->getRepository(Medical::class)
            ->find($id);
        return $this->render('medical/profil_medical.html.twig', [
            'controller_name' => 'MedicalController',
            'medical' => $medical,
        ]);
    }

    /**
     * @Route("/addmedical", name="medical")
     */

    public function addmedical(Request $request, Enfants $enfants)
    {
        $medical = new Medical();
        $form = $this->createForm(AddMedicalFormType::class, $enfant);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form ->isValid()){
            $regime = $medical->getMedicalRegime();
            $medical->setMedicalRegime($regime);

            $traitement = $medical->getMedicalTraitement();
            $medical->setMedicalTraitement($traitement);

            $allergie = $medical->getMedicalAllergie();
            $medical->setMedicalAllergie($allergie);

            $handicap = $medical->getMedicalHandicap();
            $medical->setMedicalHandicap($handicap);

            $datecreation = new \DateTime();
            $medical->setMedicalDateCreation($datecreation);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medical);
            $entityManager->flush();

            return $this->render('accueil.html.twig');
        }
        return $this->render(
            'enfants/profil_enfant.html.twig',
            array('form' => $form->createView())
        );
    }

}