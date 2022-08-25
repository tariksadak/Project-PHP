<?php

namespace Controllers;

class ContactController
{
    public function form()
    {
        
        //view contact
        $view = "contactForm.phtml";
        include_once 'views/layout.phtml';
    }


    public function submit()
    {
        // function pour envoyer un mail
        $to      = 'yopopopo111@gmail.com';
        $subject = 'Contact Request';
        $message = $_POST['message'];
        $headers = array(
            'From' => $_POST['name'],
            'Reply-To' => $_POST['email'],
            'X-Mailer' => 'PHP/' . phpversion()
        );
        
        // condition si le formulaire pas rempli pas denvoie sinon fonction mail
        if(empty($_POST['name']) or empty($_POST['email']) or empty($_POST['message']))
            {
                
                header('location:index.php?route=contactForm');
                exit;
        
            }
            else{
            
        mail($to, $subject, $message, $headers);
        
        
        $view = "successPage.phtml";
        include_once 'views/layout.phtml';
                
            }
        
        
    }
}