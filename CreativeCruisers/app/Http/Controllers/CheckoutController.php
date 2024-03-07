<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
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
            'user_id'=> auth()->user()->id,
            'billing_country' => $request->billing_country,
            'billing_address'=> $request->billing_address,
            'billing_email'=> $request->billing_email,
            'billing_total' => Cart::instance('cart')->subtotal(),
            'shipped' => false,
            'error' => null,
        ]); 

        foreach(Cart::instance('cart')->content() as $item){
            OrderProduct::create([
                'order_id'=> $order->id,
                'product_id' => $item->id,
                'quantity'=> $item->quantity,
                'status'=> $item->status,
            ]);
        }
        return back()->with('success_message', 'Thank you for your order!');

    }

    protected function decreaseQty($request, $error){
        foreach(Cart::content() as $item){
            $product = Product::find($item->id);
            $product->update(['quantity'=> $product->quantity - $item->qty]);
        }
    }

}
