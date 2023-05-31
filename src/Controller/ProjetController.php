<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'app_projet')]
    public function index(ProjetRepository $projets, CategorieRepository $categories): Response
    {
        return $this->render('projet/projet.html.twig', [
            'controller_name' => 'ProjetController',
            'projet3' => $projets->findBy(
                [],
                ['id' => 'DESC'],
                3),
            'projets' => $projets->findAll(),
            'categories'=> $categories->findAll(),
        ]);
    }

    #[Route('/projet/{id}', name: 'show_projet', methods: ['GET', 'POST'])]
    public function show($id, ProjetRepository $oneProjet): Response
    {
        // Affiche la note demandée dans le template dédié
        return $this->render('projet/single.html.twig', [
            // Récupère la note demandée par son id
            'oneProjet' => $oneProjet->findOneBy(
                ['id' => $id]
            ),
        ]);
    }
    
    #[Route('/projet/categorie/{categorie_id}', name: 'app_projetFiltered',  methods: ['GET', 'POST'])]
    public function showProjetFiltered(ProjetRepository $projetFiltered, CategorieRepository $categories, $categorie_id): Response
    {
        return $this->render('projet/projet.html.twig', [
            'controller_name' => 'ProjetController',
            'projet3' => $projetFiltered->findBy(
                [],
                ['id' => 'DESC'],
                3),
            'projets' => $projetFiltered->findBy(
                ['categorie' => $categorie_id]),
            'categories'=> $categories->findAll(),
        ]);
    }
    
    // #[Route("/image/{id}", name:"image_show")]
    // public function showPhoto($image)
    // {
    //     // Récupérer l'entité contenant les informations de l'image à partir de votre base de données
    //     // $image = $this->getDoctrine()->getRepository(Image::class)->find($id);

    //     // Passer les informations de l'image à la vue
    //     return $this->render('projet/projet.html.twig', [
    //         'image' => $image,
    //     ]);
    // }
}
