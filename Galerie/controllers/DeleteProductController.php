<?php

namespace Controllers;

class DeleteProductController
{
  
    public function deleteProduct()
    {
        //appeler le model Product pour effacer par son id
        $model = new \Models\Product();
        $model->deleteProduct($_GET['id']);
        
        //redirigera vers la page de la catégorie du produit
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
}