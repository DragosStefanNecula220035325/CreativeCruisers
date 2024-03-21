<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_product';




    protected $fillable = ['order_id', 'product_id', 'quantity', 'user_id'];

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    
    public function display(){
        $products = OrderProduct::all();
    }



}
