<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Disponibilite;

class PlanningController extends AbstractController
{
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    private $month;

    private $year;

    /**
     * @Route("/planning/month/{month}", name="planning")
     */
    public function index(Request $request, $month)
    {
        //autre manière (au cas où il faudrait ajouter des erreurs)
        /*dump($request->query->get('month'));*/
        dump($month);

        return $this->render('planning/planning.html.twig', [
            'date' => $this->moisPlanning($month, date('Y')),
            'nbsemaines' => $this->nbSemaines()
        ]);
    }

    /**
     * @param int $month le mois du planning par défaut entre 1 et 12
     * @param int $year l'année du planning par défaut
     * @return string le mois et la date
     */
    public function moisPlanning(int $month = null, int $year = null)
    {

        if ($month === null) {
            $month = date('n');
        }

        if ($year === null) {
            $year = date('Y');
        }

        if ($month < 1 || $month > 12) {
            //redirection 404
        }

        $this->month = $month;
        $this->year = $year;

        return $this->months[$this->month-1] . " " . $this->year;
    }

    /**
     * @throws
     */
    public function nbSemaines(){
        $debutMois = new \DateTime("$this->year-$this->month-01");
        $finMois = (clone $debutMois)->modify("+1 month -1 day");
        $semaines = intval($finMois->format('W')) - intval($debutMois->format('W')) + 1;
        if ($semaines < 0) {
            $semaines = intval($finMois->format('W'));
        }
        return $semaines;
    }
}
