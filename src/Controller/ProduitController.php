<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\FormType\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

#[Route('/produit')]
class ProduitController extends AbstractController
{
    // role : afficher la pa liste des produits
    #[Route('/', name: 'produit_index')]
    public function index(ProduitRepository $produitRepository): Response
    {

        $produits = $produitRepository->findAll();
     
        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    // role : afficher le detail d'un produit
    // @param : id du produit à afficher
    #[Route('/detail/{id}', name: 'produit_detail')]
    public function detail(Produit $produit): Response
    {

        return $this->render('produit/detail.html.twig', [
            'produit' => $produit,
        ]);
    }

    // role : afficher le formulaire de creation d'un produit
    #[Route('/insert', name: 'produit_insert')]
    public function insert(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        // Récupérer le fichier téléchargé
        $photoFile = $form->get('photo')->getData();

        if ($photoFile) {
            // Générer un nom unique pour le fichier téléchargé
            $newFilename = uniqid().'.'.$photoFile->guessExtension();

            // Déplacer le fichier vers le répertoire où vous souhaitez le stocker
            try {
                $photoFile->move(
                    $this->getParameter('imagesProduits'),
                    $newFilename
                );
            } catch (FileException $e) {
                echo $e->getMessage();
                // Gérer l'erreur si le déplacement du fichier échoue
            }

            // Stocker le nom du fichier dans l'entité Produit
            $produit->setPhoto($newFilename);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produit_index'); // Redirige après l'insertion
        }

        return $this->render('produit/form_produit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // role : afficher le formulaire de modification d'un produit
    #[Route('/update/{id}', name: 'produit_update')]
    public function update(Produit $produit, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            
        // Redirige après la modification
        return $this->redirectToRoute('produit_list');
    }
        return $this->render('produit/form_produit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}


