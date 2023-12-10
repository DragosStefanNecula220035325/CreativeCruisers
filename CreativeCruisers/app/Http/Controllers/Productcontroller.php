<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function show() {
    
        $products = Product::all();
        $categories = Product::distinct()->pluck('category')->toArray();
        $selectedCategory = request()->input('category'); // Retrieve selected category
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }
    
    public function showByCategory(Request $request)
    {
        $category = $request->input('category');
        $categories = Product::distinct()->pluck('category')->toArray();
    
        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('category', $category);
        })->get();
    
        $selectedCategory = $category; // Pass the selected category to the view
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }
}

