<?php
        // commencer une session 
        
    session_start();
    
    
    spl_autoload_register( function( $class ){
        
        
        // class nécessaire pour avancer
        
        // changer le mode de lecture des fichier en required_once
        
        
    require_once lcfirst( str_replace( '\\', '/', $class ) ) . '.php';
});

        // condition if pour verifier si il ya une route suivi d'un switch pour chaque case que on a besoin
        
       
    if( array_key_exists( 'route', $_GET ) )
    {
        
        
        // identifier la route du url par un $_get
       
       
       switch( $_GET['route'] )
       {
           
           
            // #1 page d'acc
            
            
            case 'home':
                  
                   
            // creation de la premiere class
            
            
            $controller = new Controllers\HomeController();
               
               
            // creation de fonction qui genere la page
            
            
            $controller->displayHomePage();
            break;
              
              
            // #2 liste des categories
            
            
            case 'listCategories':
            $controller = new Controllers\CategorieController();
            $controller->displayCategories();
            break; 
               
               
            // #3 produits par categorie
              
              
            case 'productByCategorie':
            $controller = new Controllers\CategorieController();
            $controller->displayProducts();
            break;
              
              
            // #4 PAGE D'ERREUR
            
            
            default:
            $controller = new Controllers\HomeController();
            $controller->notFound();
            break;
               
            
            // #5 connexion form
              
              
            case 'connexion':
            $controller = new Controllers\ConnexionController();
            $controller->formDeConnexion();
            break;
              
              
            // #6 se connecter
            
            
            case 'seConnecte':
            $controller = new Controllers\ConnexionController();
            $controller->connexion();
            break;
              
              
            // #7 deconnexion
            
            
            case 'deconnexion':
            $controller = new Controllers\ConnexionController();
            $controller->deconnexion();
            break;
            
            // #8 ajouter un produit
            
            case 'addProduct':
            $controller = new Controllers\AddProductController();
            $controller->form();
            break;
            
            // #8 envoyer les donnes des produits ajouter
            
            case 'submitAddProduct':
            $controller = new Controllers\AddProductController();
            $controller->submitAddProduct();
            break;
            
            
            // #9 modifier le produit
            
            
            case 'editProduct':
            $controller = new Controllers\EditProductController();
            $controller->displayForm();
            break;
            
            
            // #10 envoyer les donnes de la modification
            
            
            case 'submitEditProduct':
            $controller = new Controllers\EditProductController();
            $controller->submitEditProduct();
            break;
            
            // #11 effacer le produit
            
            
            case 'deleteProduct':
            $controller = new Controllers\DeleteProductController();
            $controller->deleteProduct();
            break;
            
            
            // #12 option contact
            
            
            case 'contactForm':
            $controller = new Controllers\ContactController();
            $controller->form();
            break;
            
            
            // #13 envoyer les infos de contact 
            
            
            case 'contactSubmit':
            $controller = new Controllers\ContactController();
            $controller->submit();
            break;
            
            // #14 page en progres
            
            case 'inProgress':
            $controller = new Controllers\HomeController();
            $controller->inProgress();
            break;
            
            // #15 modifier les photos
            
            case 'editPictures':
            $controller = new Controllers\EditProductController();
            $controller->editPictures();
            break;
          
       }
}
    
    
        // sinon envoie page d'accueil
        
        
    else
{
    header( 'Location: index.php?route=home' );
    exit();
}

    