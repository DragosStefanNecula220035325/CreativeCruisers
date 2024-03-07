<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'category',
        'Stock_num',
        'quantity',
    ];

    public function reviews(){
        return $this->hasMany('App\Product');
    }
}

function showProducts() {
    $categories = Product::distinct()->pluck('category')->toArray();
    return view('products.index', ['categories' => $categories]);
}



use App\Models\HTTP\Controllers;
use Illuminate\Http\Request;
