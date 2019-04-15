<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Disponibilite;

class PlanningController extends AbstractController
{
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    private $month;

    private $year;

    /**
     * PlanningController constructor.
     * @param int $month le mois du planning par défaut entre 1 et 12
     * @param int $year l'année du planning par défaut
     * @return string le mois et la date
     */
    public function moisPlanning(int $month, int $year)
    {
        if ($month < 1 || $month > 12) {
            $this->redirect('404');
        }

        $this->month = $month;
        $this->year = $year;

        return $this->months[$this->month-1] . " " . $this->year;
    }

    /**
     * @Route("/planning", name="planning")
     */
    public function index()
    {
        return $this->render('planning/planning.html.twig', [
            'date' => $this->moisPlanning(date('n'), date('Y'))
        ]);
    }
}
