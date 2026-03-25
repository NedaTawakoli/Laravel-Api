<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function AddProduct(){
        DB::table('products')->insert([
            [
                "pro_name"=>"Banana",
                "price"=>210,
                "model"=>"Pakistan",
            ],
             [
                "pro_name"=>"BlueBarry",
                "price"=>300,
                "model"=>"Pakistan",
            ],
             [
                "pro_name"=>"Berry",
                "price"=>220,
                "model"=>"Afghani",
            ],
             [
                "pro_name"=>"Kiwi",
                "price"=>250,
                "model"=>"Iran",
            ],
        ]);
        return "Product added";
    }
    public function AllProduct(){
        $allProduct = DB::table("products")->limit(10)->get();
        return $allProduct;
    }
    public function useWhere(){
        // $whereProduct = DB::table('products')->where("id","<>",2)->get();
        // $whereProduct = DB::table('products')->max("id");
        // $whereProduct = DB::table('products')->min("id");
        // $whereProduct = DB::table('products')->avg("id");
        // $whereProduct = DB::table('products')->count("id");
        $whereProduct = DB::table('products')->orderBy("score")->get();
        return $whereProduct;
    }
    public function fetchProduct(){
       $product = new product();
       $product->pro_name = "Apple";
       $product->price = 190;
       $product->model = "Jaghori";
       $product->save();
       return "Data successfully";
    }
}
