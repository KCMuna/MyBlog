<?php
namespace App\Repository;

class ProductRepository implements IProductRepository{
    
public function getAllProducts(){
    return Product::all();

}

}



?>