<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
 
class CartController extends Controller
{


    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems'=>$cartItems]);
    }

    

    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        $duplicate = Cart::search(function($cartItem, $rowId) use ($product){
            return $cartItem->id === $product;
        });

        if ($duplicate->isNotEmpty()){
            Cart::where('id', $request->rowId)->increment('qty');
        }
        

        
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');
        return redirect()->back()->with('message', 'Success');
        
    }

    public function removeItem(Request $request){
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }

}
