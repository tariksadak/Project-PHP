<?php

namespace Controllers;

class AddProductController
{
    public function form()
    {
        
        //fetch tout les categories
        $model = new \Models\Categorie();
        $categories = $model->getListOfCategories();
        
        //la view
        $view = 'formProduct.phtml';
        include_once 'views/layout.phtml';
    }
    
    public function submitAddProduct()
    {
        //checker du formulaire
        
        if(!empty($_POST))
        {
            if(empty($_POST['name']) or empty($_POST['description']) or empty($_POST['category_id']) or empty($_FILES['pictures']['tmp_name'][0]))
            {
                
                header('location:index.php?route=addProduct');
                exit;
        
            }
            
            
            //ajout du produit avec id nom et description
            $modelProduct = new \Models\Product();
            $modelProduct->addProduct($_POST['id'], $_POST['name'], $_POST['description']);
            
            //retrouver lid de la page qui va se cree
            $productId=$modelProduct->getDb()->lastInsertId();
            
            
            //ajout de product par sa categorie
            $modelProductsCategories = new \Models\ProductsCategories();
            $modelProductsCategories->addProductCategory($productId, $_POST['category_id']);
            
            //  echo'<pre>';
            //   print_r($_FILES['pictures']);
            //  echo'</pre>';
            
            
                //bucle pour inserer plusiers image
                for($i = 0;$i<count($_FILES['pictures']['tmp_name']);$i++){
                    
                    move_uploaded_file($_FILES['pictures']['tmp_name'][$i], 'public/uploads/'.$_FILES['pictures']['name'][$i]);
                        
                    $url= $_FILES['pictures']['name'][$i];
                    
                    $modelProductsCategories = new \Models\Pictures();
                    $modelProductsCategories->AddPictures($productId, $url);
                
            }


            header('location:index.php?route=productByCategorie&id='.$_POST['category_id']);
            exit;
            
        }
    }
}