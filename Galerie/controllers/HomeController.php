<?php


    // nom de l'endroit
    
    
namespace Controllers;


    // class appeler


class HomeController
{
    public function displayHomePage()
    {
        
        
    // le view utilise
        
        $view = 'home.phtml';
        
        
    // le squelette de tout les views
    
    
        include_once 'views/layout.phtml';
    }
    
    
    // redirection page 404
    
    
    public function notFound()
    {
        $view = 'notFound.phtml';
        include_once 'views/layout.phtml';
    }
    
    //redirection page en progres
    
    public function inProgress()
    {
        $view = 'inProgress.phtml';
        include_once 'views/layout.phtml';
    }

}