<?php

namespace Controllers;

class EditProductController
{
    
    public function displayForm()
    {
        
        // prendre le produit par son id
        $model = new \Models\Product();
        $product = $model->getProductById($_GET['id']);
        
        //checker si il ya pas de produit 
        if(!$product) {
          
        header('location:index.php?route=notFound');
        
        }
        
        else{
            
         // si il ya on prend la list des categories
        $model = new \Models\Categorie();
        $categories = $model->getListOfCategories();
        

        $view = 'formProduct.phtml';
        include_once 'views/layout.phtml';
        
        }
        
    }


     
    public function submitEditProduct()
    {
        //checker du formulaire
        if(!empty($_POST))
        {
            if(empty($_POST['name']) or empty($_POST['description']) or empty($_POST['id']))
            {
                
                header('location:index.php?route=editProduct&id='.$_POST['id']);
                exit;
            
            }

                //edit product par son nom description id
                $model = new \Models\Product();
                $model->editProduct($_POST['name'], $_POST['description'], $_POST['id']);

                
                //edit product par sa categorie
                $modelCat = new \Models\ProductsCategories();
                $modelCat->editProductCategory($_POST['id'], $_POST['category_id']);
                
                //chercher le produit par son id 
                $model = new \Models\Product();
                $product = $model->getProductById( $_POST['id']);
                
                
                print_r($product);
                
                //si le length $product pictures egal a 0 ET pas de nom temporaire pour les images 
                if(count($product['pictures'])== 0 and empty($_FILES['pictures']['tmp_name'][0])){

                    header('location:index.php?route=editProduct&id='.$_POST['id']);
                    exit;
                }
                else{
                    
                    
                    //si il ya un nom temporaire
                    if(!empty($_FILES['pictures']['tmp_name'][0])){
                        
                        for($i = 0;$i<count($_FILES['pictures']['tmp_name']);$i++){
                            
                            move_uploaded_file($_FILES['pictures']['tmp_name'][$i], 'public/uploads/'.$_FILES['pictures']['name'][$i]);
                                
                            $url= $_FILES['pictures']['name'][$i];
                            
                        $modelProductsCategories = new \Models\Pictures();
                        $modelProductsCategories->AddPictures($_POST['id'], $url);
                        
                        
                        }
                        
                    }
                }
                
                header('location:index.php?route=productByCategorie&id='.$_POST['category_id']);
                exit();
        
        }
    
    
    }
    public function editPictures(){
            //appeler le model Product
        $model = new \Models\Pictures();
        //appeler la méthode updateProduct en lui transmettant les infos qui viennent du formulaire ($_POST)
        $model->deletePictures($_GET['id']);
        
        //redirigera vers la page de la catégorie du produit
        //var_dump($_SERVER);
         header('location:'.$_SERVER['HTTP_REFERER']);
         exit;
        }
}