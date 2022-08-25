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
        self::$_dbCon = new \PDO( '?;?;?', '?', '?' ); //utilisation de pdo pour entrer dans la base de donne
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