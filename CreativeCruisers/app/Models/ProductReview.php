<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = "product_review";

    protected $fillable = [
        'name',
        'review',
        'rating',
        'product_id'
    ];


    public function reviews(){
        return $this->belongsTo('App\Product');
    }
}



