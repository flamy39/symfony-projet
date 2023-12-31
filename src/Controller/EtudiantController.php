<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant_list')]
    public function list(EtudiantRepository $etudiantRepository): Response
    {
        // Appel au modèle
        // Le contrôleur va demander au modèle la liste des étudiants
        $etudiants = $etudiantRepository->findAll();

        // Appel à la vue
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants
        ]);
    }

    #[Route('/etudiants/{id}', name: 'app_etudiant_show',requirements:['id' => '\d+'])]
    public function show(EtudiantRepository $etudiantRepository, int $id): Response
    {
        // Appel au modèle
        $etudiant = $etudiantRepository->find($id);

        // Appel à la vue
        return $this->render('etudiant/show.html.twig', [
            'etudiant' => $etudiant
        ]);
    }

    #[Route('/etudiants/mineurs', name: 'app_etudiant_mineurs_list')]
    public function listMineurs(EtudiantRepository $etudiantRepository): Response
    {
        // Appel au modèle
        $etudiants = $etudiantRepository->findMineurs2();
        // Appel à la vue
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants
        ]);
    }



}
