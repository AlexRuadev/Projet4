<?php

namespace App\Controller;

use App\Entity\Heritage;
use App\Form\AddEnfantsFormType;
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

class EnfantsController extends AbstractController
{
    /**
     * @Route("/profil-enfant/{id}", name="enfant")
     */
    public function index($id)
    {
        $enfants =  $this->getDoctrine()
            ->getRepository(Enfants::class)
            ->find($id);
        return $this->render('enfants/profil_enfant.html.twig', [
            'controller_name' => 'EnfantsController',
            'enfant' => $enfants,
        ]);
    }

    /**
     * @Route("/addenfant/{id}", name="enfants")
     */

    public function addenfant(Request $request, Parents $parents, $id)
    {
        $enfant = new Enfants();
        $form = $this->createForm(AddEnfantsFormType::class, $enfant);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form ->isValid()){
            $prenom = $enfant->getEnfantsPrenom();
            $enfant->setEnfantsPrenom($prenom);

            $nom = $enfant->getEnfantsNom();
            $enfant->setEnfantsNom($nom);

            $date = $enfant->getEnfantsDateDeNaissance();
            $enfant->setEnfantsDateDeNaissance($date);

            $statut = 1;
            $enfant->setEnfantsStatus($statut);

            $datecreation = new \DateTime();
            $enfant->setEnfantsDateCreation($datecreation);

            $enfant->setEnfantsParents($parents);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enfant);
            $entityManager->flush();



            return $this->render('accueil.html.twig');
        }
        return $this->render(
            'enfants/add_enfant.html.twig',
            array('form' => $form->createView())
        );
    }
}
