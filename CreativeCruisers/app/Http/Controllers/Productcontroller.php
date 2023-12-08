<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        $data = Product::all();
        return view("product_page", ["products"=>$data]);
    }
    ###Takes first instance of each product details and outputs them in the view###
    public function productDetails($id){
        $product = Product::find($id);
        return view('ProductDetails');
    }
}
