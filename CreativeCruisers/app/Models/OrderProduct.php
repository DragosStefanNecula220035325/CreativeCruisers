<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    public function order(){
        return $this->belongsTo(Order::class);
    }
    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'quantity'];
}
