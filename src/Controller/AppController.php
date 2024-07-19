<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/app')]
class AppController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {


        return $this->render('app/index.html.twig', [
            'produits' => '$produits',
        ]);
    }

   
        #[Route('/app_app', name: 'app_app')]
        public function app(): Response
        {
    
    
            return $this->render('app/index.html.twig', [
                'produits' => '$produits',
            ]);
        }


}
