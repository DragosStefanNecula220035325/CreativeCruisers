<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
 
class CartController extends Controller
{


    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('checkout', ['cartItems'=>$cartItems]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');
        return redirect()->back()->with('message', 'Success');
        
    }
}
