<?php

namespace Controllers;

class CategorieController
{
    public function displayCategories()
    {
        
        //on appele la database pour les info necessaire
        $categorieModel = new \Models\Categorie();
        $categories = $categorieModel->getListOfCategories();
        
        $view = "listCategories.phtml";
        include_once 'views/layout.phtml';
    }


    public function displayProducts()
    {
        //trouver l'id de la categorie
        $id = $_GET['id'];
        
        //recuperer le titre de la categorie
        $model = new \Models\Categorie();
        $categorie = $model->getCategorieById($id);
        
        //return $Row['id'] ?? 'default value';
        
        
        //condition pour eviter les abus et les erreurs
        if(!$categorie) {
          
        header('location:index.php?route=notFound');
        
        }
        
        else {
            
              //prendre liste des produits
        $model = new \Models\Product();
        $products = $model->getProductsByCategorie($id);
        
        $view = 'productByCategorie.phtml';
        include_once 'views/layout.phtml';
        
        
        
        }
    }
}