<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
}

function showProducts() {
    $categories = Product::distinct()->pluck('category')->toArray();
    return view('products.index', ['categories' => $categories]);
}