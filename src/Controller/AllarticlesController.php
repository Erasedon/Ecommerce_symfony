<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Taille;
use App\Entity\Articles;
use App\Form\SearchType;
use App\Entity\Categories;
use App\Repository\TailleRepository;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



class AllarticlesController extends AbstractController
{
    
    #[Route('/allarticles', name: 'app_allarticles',methods: ['GET'])]
    public function index(Request $request,ArticlesRepository $articlesRepository,CategoriesRepository $categoriesRepository,TailleRepository $tailleRepository): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        // $sarticles= [];
        // $checkouts= [];
        $searchTerm="";
        if($searchTerm === "" || empty($searchTerm)){
            $sarticles = $articlesRepository->findAll();
          
        }
      
        // if ($form->isSubmitted() && $form->isValid()) {
            
            // $searchTerm = $form->getData(); 
            // $searchTerm = $form->get('searchTerm');
            // Perform the search and return the results
        //    $checkout = $request->request->get("checkout");
            // $sarticles = $articlesRepository->findByNomArticle($searchTerm);  
            //  dd($searchTerm);
            // dd($sarticles);
            // $checkouts = $categoriesRepository->findByNomCategory($checkout);   
            
            // return $this->render('allarticles/search.html.twig', [
            // 'searchTerm' =>$sarticles,
            // ]);
        // } 
        // $sarticles="";
        
        return $this->render('allarticles/index.html.twig', [
            'controller_name' => 'AllarticlesController',
            'form' => $form->createView(),
            'taille' => $tailleRepository->findAll(),
            'searchTerm' => $sarticles,
            'categories' => $categoriesRepository->findAll(),
        ]);
        // return $this->render('allarticles/index.html.twig', [
        //     'controller_name' => 'AllarticlesController',
        //     'taille' => $tailleRepository->findAll(),
        //     'categories' => $categoriesRepository->findAll(),
        //     'articles' => $articlesRepository->findAll(),
        //     'checkbox' =>$checkouts,
        // ]);

    }
    
    #[Route('/allarticles/search', name: 'app_allarticles_search', methods: ['GET'])]     
    public function showallarticles(Request $request,ArticlesRepository $articlesRepository): Response
    {
        // $form = $this->createForm(SearchType::class);
        // $form->handleRequest($request);
        // $sarticles= [];
        $searchTerm = $request->get('search')['searchTerm'];
        // $searchTerm = json_decode($request->getContent(), true);

        // Faites ici le traitement des résultats et retournez la réponse
      
            $sarticles = $articlesRepository->findByNomArticle($searchTerm);
           
            if($sarticles === []){
                $sarticles = $articlesRepository->findAll();
            }
        

        return $this->render('allarticles/search.html.twig', [
            'searchTerm' =>$sarticles,
            ]);
    }
    #[Route('/allarticles/checkbox', name: 'app_allarticles_checkbox', methods: ['GET'])]     
    public function trierallarticles(Request $request,ArticlesRepository $articlesRepository,TailleRepository $tailleRepository): Response
    {
        // $form = $this->createForm(SearchType::class);
        // $form->handleRequest($request);
        // $sarticles= [];
        $searchTerm = $request->get('checkbox');
        // $searchTerm = json_decode($request->getContent(), true);

        // Faites ici le traitement des résultats et retournez la réponse

            $sarticles = $articlesRepository->findByidCat($searchTerm);
            // dd($sarticles);
            if($sarticles === []){
                $sarticles = $articlesRepository->findAll();
            }
            
            

        return $this->render('allarticles/search.html.twig', [
            'searchTerm' =>$sarticles,
            ]);
    }
    #[Route('/allarticles/checkboxt', name: 'app_allarticles_checkboxTaille', methods: ['GET'])]     
    public function triertailleallarticles(Request $request,ArticlesRepository $articlesRepository,TailleRepository $tailleRepository): Response
    {
        // $form = $this->createForm(SearchType::class);
        // $form->handleRequest($request);
        // $sarticles= [];
        $searchTerm = $request->get('taille');
        // $searchTerm = json_decode($request->getContent(), true);

        // Faites ici le traitement des résultats et retournez la réponse

            $sarticles = $tailleRepository->findByidtaille($searchTerm);
            // dd($sarticles);
            if($sarticles === []){
                $sarticles = $articlesRepository->findAll();
            }
            
            

        return $this->render('allarticles/search.html.twig', [
            'searchTerm' =>$sarticles,
            ]);
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
