<?php

namespace Controllers;

class ConnexionController
{
    // page de connection
    public function formDeConnexion()
    {
      
        $view = "connexion.phtml";
        include_once 'views/layout.phtml';
    }
    
    public function connexion()
    {

        $model = new \Models\Admin();
        
        //on fetch lemail par $_post
        $admin = $model->getAdmin($_POST['email']);
        
        if(!$admin)
        {
            //recharge
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else
        {
        
        // password_verify utilise pour verifier le mot passe
            if(password_verify($_POST['password'], $admin['password']))
            {
                //on cree une session
                $_SESSION['admin'] = $admin;
                unset($_SESSION['message']);
                header('location:index.php?route=home');
                exit;
                
            }
                else{
                    //recharge
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
            
        }
        
    }
    //option deconnexion
    public function deconnexion()
    {
        session_destroy();
        
        header('location:index.php?route=home');
        exit;
    }
}