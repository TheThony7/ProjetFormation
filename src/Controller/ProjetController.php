<?php

namespace App\Controller;

use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'app_projet')]
    public function index(ProjetRepository $projets): Response
    {
        return $this->render('projet/projet.html.twig', [
            'controller_name' => 'ProjetController',
            'projets' => $projets->findBy(
                [],
                ['id' => 'DESC'],
                3)
        ]);
    }
}
