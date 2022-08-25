<?php

namespace Models;

class Admin extends Database
{
    public function getAdmin( string $email)
    {
        $query = $this->getDb()->prepare( 
            "SELECT 
                    * 
                FROM 
                   admin
                WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch();
    }
    
}

//fetch email