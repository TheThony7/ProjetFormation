<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $categories): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'categories' => $categories -> findAll(),
        ]);
    }

//     #[Route('/categorie/filtre', name:'app_categorie_filtre')]
//     public function filterByIconAction(int $iconId, EntityManagerInterface $entityManager, $categorie)
// {
//     $categorie = $entityManager->getRepository(Icon::class)->find($iconId);
//     // Utilisez l'objet $icon pour filtrer les éléments
// }
}
