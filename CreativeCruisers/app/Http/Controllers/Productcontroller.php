<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function show(){
        $data = Product::all();
        return view("product_page", ["products"=>$data]);
    }
}
