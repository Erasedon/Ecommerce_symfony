<?php

namespace App\Controller;

use App\Entity\Taille;
use App\Entity\Articles;
use App\Entity\Categories;
use App\Form\SearchType;
use App\Repository\TailleRepository;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllarticlesController extends AbstractController
{
    #[Route('/allarticles', name: 'app_allarticles')]
    public function index(Request $request,ArticlesRepository $articlesRepository,CategoriesRepository $categoriesRepository,TailleRepository $tailleRepository): Response
    {

        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchTerm = $form->get('searchTerm')->getData();
            // Perform the search and return the results
            $articles = $articlesRepository->findOneByNomArticle($searchTerm);
            dd($articles);
        }

        // $searchTerm = 12;
        return $this->render('allarticles/index.html.twig', [
            'controller_name' => 'AllarticlesController',
            'form' => $form->createView(),
            'taille' => $tailleRepository->findAll(),
            'categories' => $categoriesRepository->findAll(),
            'articles' => $articlesRepository->findAll(),
        ]);
        // return $this->render('allarticles/index.html.twig', [
        //     'controller_name' => 'AllarticlesController',
        //     'taille' => $tailleRepository->findAll(),
        //     'categories' => $categoriesRepository->findAll(),
        //     'articles' => $articlesRepository->findAll(),
        // ]);

    }
    #[Route('/allarticles/{id}', name: 'app_allarticles_show', methods: ['GET'])]     
    public function show(Articles $article,Categories $categorie,Taille $taille): Response
    {
        return $this->render('allarticles/show.html.twig', [
            'categorie' => $categorie,
            'article' => $article,
            'taille' => $taille,
        ]);
    }
}
