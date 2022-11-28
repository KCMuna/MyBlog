<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
     public function __construct(IProductRepository $product){
        $this->product =$product;
     }
    public function index(){
        $products= $this->product =getAllProducts();
         
        return view('product.index')->with('products',$products);
    }
}
