<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonEspaceController extends AbstractController
{
    #[Route('/mon/espace', name: 'app_mon_espace')]
    public function index(): Response
    {
        return $this->render('mon_espace/monespace.html.twig', [
            'controller_name' => 'MonEspaceController',
        ]);
    }
}
