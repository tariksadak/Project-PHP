<?php

namespace Models;

class ProductsCategories extends Database
{
   
    public function addProductCategory( int $product_id, $category_id)
    {
        $query = $this->getDb()->prepare( 
            "INSERT INTO products_categories (product_id, category_id) VALUES (?, ?)");
        $query->execute([$product_id, $category_id]);
    }
    
    public function editProductCategory( int $id_product, $id_category)
    
    {    
        
        $query = $this->getDb()->prepare(
            
        
            " UPDATE products_categories 
            SET category_id = ?
            WHERE product_id = ? "
            
            );
          
        
        $query->execute(array($id_category, $id_product));
        
    }
    
   
}