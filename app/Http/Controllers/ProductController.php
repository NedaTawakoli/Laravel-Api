<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
       $product = product::all();
       return $product;
    }
    public function add(){
       $product = new product();
       $product->pro_name = "Pear";
       $product->price=200;
       $product->model="Afghani";
       $product->save();
       return "pear save";
    }
    public function show($id){
     $product = new product();
    $singleProduct = $product->findOrFail($id);
     return $singleProduct;
    }
    public function update($id){
       $product = new product();
       $singleOne = $product->findOrFail($id);
       $singleOne->pro_name = "mango";
       $singleOne->price = 250;
        $singleOne->update();
       return "apple updated";
    }
    public function delete($id){
       $product = new product();
      $deletedProduct = $product->findOrFail($id);
       $deletedProduct->delete($id);
       return "product sucessfully deleted";
    }
}
