<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    //
    public function index(){
        $cartItems = Cart::instance('cart')->content();
        return view('checkout', ['cartItems'=>$cartItems]);
    }
    public function store(Request $request){
        $order = Order::create([
            'user_id'=> session()->get('id'),
            'billing_country' => $request->billing_country,
            'billing_address'=> $request->billing_address,
            'billing_email'=> $request->billing_email,
            'billing_total' => $request->billing_total,
            'error' => null
        ]); 

        foreach(Cart::instance('cart')->content() as $item){
            OrderProduct::create([
                'order_id'=> $order->id,
                'product_id' => $item->id,
            ]);
        }
    }

}
