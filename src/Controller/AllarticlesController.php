<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllarticlesController extends AbstractController
{
    #[Route('/allarticles', name: 'app_allarticles')]
    public function index(): Response
    {
        return $this->render('allarticles/index.html.twig', [
            'controller_name' => 'AllarticlesController',
        ]);
    }
}
