<?php

namespace Models;

class Categorie extends Database
{
    
    //function appele dans les controllers
    
    
    public function getListOfCategories()
    {
        
        //transform code sql en variable pour lappele dans le php
        
        
        $query = $this->getDb()->prepare( 
            "SELECT 
                    * 
                FROM 
                    `categories`
                ORDER BY `title` ASC");
        $query->execute();
        
        //fetch le tout
        
        
        return $query->fetchAll();
    }
    
    
    // on fetch lid de nos categories
    
    
    public function getCategorieById( int $id)
    {
         $query = $this->getDb()->prepare( 
            "SELECT 
                    title, description 
                FROM 
                    `categories`
                WHERE id = ?");
        $query->execute([$id]);
        
        //fetch que lid
        
        
        return $query->fetch();
    }
}