<?php

namespace Models;

class Pictures extends Database
{ 
    
    // prendre la photo par son id
     public function getPictures(int $id)
     {
         $query = $this->getDb()->prepare( 
             "SELECT *
             FROM pictures
             WHERE product_id = ?
                    ");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    
    
    // ajouter une photo
    public function AddPictures( mixed $id, $url)
    {
        
        $query = $this->getDb()->prepare(
            
           " INSERT INTO pictures ( product_id, url )VALUES (?, ?) "
            
            );
        $query->execute( [ $id, $url ] );
        
    }
    
    // effacer la photo
    public function deletePictures( int $id)
        {
            
            $query = $this->getDb()->prepare(
                
                " DELETE FROM pictures
                WHERE id = ? "
                
                );
                
            $query->execute(array($id));
            
        
    }
    }
    
   
