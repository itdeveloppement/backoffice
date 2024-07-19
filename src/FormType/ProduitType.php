<?php

namespace App\FormType;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\User;
use Phar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType {

    // construire un formulaire
public function buildForm(FormBuilderInterface $builder, array $options)
{
    // champ reference
    $builder->add("ref", TextType::class,[
        'label'=>"Réference du produit",
        // doit etre remplit
        'constraints' => [
            // le champ ne peut pas etre nul
            new Assert\NotBlank([
                "message" => "Ce champ doit etre remplit"
            ])
        ],
        'attr' => [
            'placeholder' => 'Entrez la référence du produit ici'
        ]
    ])

    // liste deroulante categorie
    ->add('categorie', EntityType::class, [
        'class' => Categorie::class,
        'choice_label' => 'nom',
        'label' => 'Catégorie',
        'placeholder' => 'Choisissez une catégorie',
        

    ])

    // champ nom du produit
    ->add ("nom", TextType::class,[
        'label' => "Nom du produit",
        
        // contrainte de validation des champs
        'constraints' => [
            // le champ ne peut pas etre nul
            new Assert\NotBlank([
                "message" => "vous devez remplir ce champ"
            ])
            ],
        'attr' => [
            'placeholder' => 'Entrez le nom du produit ici'
        ]
    ])

    
    // champ prix du produit
    ->add ("prix", NumberType::class,[
        'label' => "Prix",
        
        // contrainte de validation des champs
        'constraints' => [
            // le champ ne peut pas etre nul
            new Assert\NotBlank([
                "message" => "vous devez remplir ce champ"
            ])
            ],
        'attr' => [
            'placeholder' => 'Entrez la prix du produit ici'
        ]
    ])

    // champ photo du produit
    ->add ("photo", TextType::class,[
        'label' => "Photo",

        // contrainte de validation des champs
        'constraints' => [
            // le champ ne peut pas etre nul
            new Assert\NotBlank([
                "message" => "vous devez remplir ce champ"
            ])
            ],
    ])

     // champ description du produit
     ->add ("description", TextType::class,[
        'label' => "Description",
    
        'required' => false,
        'constraints' => [
        new Assert\NotBlank([
            'message' => 'Vous devez remplir ce champ.'
        ])
        ],

        'attr' => [
            'placeholder' => 'Entrez la description du produit ici'
        ]
    ])

     // champ photo du produit
     ->add ("photo", TextType::class,[
        'label' => "Photo",
        
        // contrainte de validation des champs
        'constraints' => [
            // le champ ne peut pas etre nul
            new Assert\NotBlank([
                "message" => "vous devez remplir ce champ"
            ])
        ]
    ])

    // champ stock
    ->add ("status", CheckboxType::class,[
        'label' => "Stock",
        'required' => false,
        'attr' => [
            "class" =>"form-control",
          
        ],
         // attribut du label css pour style
         'label_attr'=> [
            "class"=>"form-label"
        ],
        'row_attr' => [
        'class' => 'flex align-center',
    ],
    ])

    ->add('photo', FileType::class, [
        'label' => 'Photo',
        'required' => false, // Si le champ n'est pas obligatoire
        
    ])

    // bouton submit
    ->add("Enregistrer", SubmitType::class,[
        'attr' => [
        'class' => 'btn'
    ]
    ]);
}  

public function configureOptions(OptionsResolver $resolver)
{
    // faire le lien entre data_class et User notament pour le pre remplissage
    $resolver->setDefaults([
        'data_class' => Produit::class
    ]);
}
}