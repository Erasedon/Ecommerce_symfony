<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewArticlesController extends AbstractController
{
    #[Route('/view/articles', name: 'app_view_articles')]
    public function index(): Response
    {
        return $this->render('view_articles/index.html.twig', [
            'controller_name' => 'ViewArticlesController',
        ]);
    }
}
