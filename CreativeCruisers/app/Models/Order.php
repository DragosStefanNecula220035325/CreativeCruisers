<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'billing_country', 'billing_address', 'billing_email', 'billing_total'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products(){
       return $this->hasMany('App\Product')->withPivot('quantity');
    }

    public function orderStatus(){
        return $this->hasMany(OrderStatus::class);
    }

    public function orderproduct(){
    return $this->hasMany('App\OrderProduct')->withPivot('quantity');
}
}
