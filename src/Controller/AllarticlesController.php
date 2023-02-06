<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllarticlesController extends AbstractController
{
    #[Route('/allarticles', name: 'app_allarticles')]
    public function index(ArticlesRepository $articlesRepository,CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('allarticles/index.html.twig', [
            'controller_name' => 'AllarticlesController',
            'categories' => $categoriesRepository->findAll(),
            'articles' => $articlesRepository->findAll(),
        ]);
    }
    #[Route('/allarticles/{id}', name: 'app_allarticles_show', methods: ['GET'])]     
    public function show(Articles $article,Categories $categorie): Response
    {
        return $this->render('allarticles/show.html.twig', [
            'categorie' => $categorie,
            'article' => $article,
        ]);
    }
}
