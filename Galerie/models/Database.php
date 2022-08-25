<?php

namespace Models;


// class necessaire
abstract class Database
{
    private static $_dbCon; // variable a appele dans notre php
    
    private static function setDb() //fonction qui sert a appele la base de donne dans notre php
    {
        
        try
        {
        self::$_dbCon = new \PDO( 'mysql:host=db.3wa.io;dbname=tariksadak_Canape;charset=utf8', 'tariksadak', '50725e67e31e7b4201b3bc8e2edfdb81' ); //utilisation de pdo pour entrer dans la base de donne
        self::$_dbCon->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
        }
        catch (TypeError $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
    
 
    public function getDb() 
    {
        if( self::$_dbCon == null )
        {
            self::setDb();
        }
        
        return self::$_dbCon;
        
        //sinon rien
    }
    
}