<?php

namespace App\Controller;

use App\Entity\Taille;
use App\Entity\Articles;
use App\Entity\Categories;
use App\Repository\TailleRepository;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    #Request $request,ArticlesRepository $articlesRepository,TailleRepository $tailleRepository,Articles $article,Categories $categorie,Taille $taille
    public function index(Request $request,ArticlesRepository $articlesRepository,): Response
    {
        #function de l'ajout au panier la commande 
        $session = $request->getSession();
        // $ses = $session->get('id_panier');
        $ses = $session->get('panier');
        // dd($ses); #session 
        $pan = [];
        foreach($ses as $sessa){
            // Suppose que $objet est un objet de la classe "MonObjet"
        $searchTerm = get_object_vars($sessa);
        // Suppose que $objet est un objet de la classe "MonObjet"
            $searchTerm = [
            'nom_articles' => $sessa->getNomArticles()
            ];

            // dd($tableau);
            $pan=$articlesRepository->findByNomArticle($searchTerm);
        }
        
        
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'session'=>$pan,
        ]);
    }
    
    #function de la quantité et prix total
    public function quantité(ArticlesRepository $articlesRepository,TailleRepository $tailleRepository,Articles $article,Categories $categorie,Taille $taille): Response
    {
        #session 
        #function de l'ajout au panier la commande 
        session_start();

        
        
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }
    #function de trie de la session 
    public function triearticle(ArticlesRepository $articlesRepository,TailleRepository $tailleRepository,Articles $article,Categories $categorie,Taille $taille): Response
    {
        #session 
        #function de l'ajout au panier la commande 
        session_start();

        
        
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }
}
