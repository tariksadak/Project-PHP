<?php

namespace Models;

class Product extends Database
{
    
    // retrouver le produit par ca categorie en utilsant id
    public function getProductsByCategorie( int $id)
    {
        $query = $this->getDb()->prepare( 
            "SELECT products.id, name, description
            FROM products
            INNER JOIN products_categories ON products.id=products_categories.product_id
            WHERE category_id = ?
                    ");
        $query->execute([$id]);
        $products= $query->fetchAll();
        
        foreach( $products as &$product ){
            
               $picQuery = $this->getDb()->prepare( 
                 "SELECT *
                 FROM pictures
                 WHERE product_id = ?
                        ");
            $picQuery->execute([$product['id']]);
            $pictures = $picQuery->fetchAll(); 
            
            $product['pictures'] = $pictures;
        
        }
        
        return $products;
        
    }
    
    // ajouter le produit appartir du nom description et id
    public function addProduct( mixed $id, $name, $description)
    {
        
        $query = $this->getDb()->prepare(
            
           " INSERT INTO products ( name, description )VALUES ( ?, ?) "
            
            );
        $query->execute( [ $name, $description ] );
        
    }
    // Chercher un produit par son id
    public function getProductById( int $id)
    {
        
        $query = $this->getDb()->prepare(
            
            " SELECT products.id, name, description, category_id
            FROM products
            INNER JOIN products_categories ON products_categories.product_id = products.id
            WHERE products.id = ? "
            
            );
            $query->execute([$id]); // $id correspond au '?' de la requête SQL
            $product = $query->fetch();

            if(empty($product)) {
          
            return $product;
        
            }
        
            else{
                
            $picQuery = $this->getDb()->prepare( 
             "SELECT *
             FROM pictures
             WHERE product_id = ?
                    ");
            $picQuery->execute([$product['id']]);
            $pictures = $picQuery->fetchAll(); 
            
            $product['pictures'] = $pictures;
            return $product;
            }
        
        
    }
    
    // modifier le produit appartir du nom description et id
    public function editProduct( mixed $name, $description, $id)
    
    {    
        // variable qui va nous donne tout se que lon a besoin
        $query = $this->getDb()->prepare(
            
        // update la requete
            " UPDATE products 
            SET name = ?, description = ?
            WHERE id = ? " // Le "?" est utilisé pour la sécurité !
            
            );
          
        // Executer la requette    
        $query->execute(array($name, $description, $id));
        
    }
    
    
    // effacer le produit appartir de l'id '''order = product_cat 1st, pictures 2nd then product'''
    public function deleteProduct( int $id)
    {
        $query = $this->getDb()->prepare(
            
            " DELETE FROM products_categories
            WHERE product_id = ? "
            
            );
            
        $query->execute(array($id));
        
        $query = $this->getDb()->prepare(
            
            " DELETE FROM pictures
            WHERE product_id = ? "
            
            );
            
        $query->execute(array($id));
        
        
        $query = $this->getDb()->prepare(
            
            " DELETE FROM products
            WHERE id = ? "
            
            );
            
        $query->execute(array($id));
        
    }
    
   
}