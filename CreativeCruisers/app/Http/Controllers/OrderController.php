<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function getOrderDetails(Request $request, User $profile){
        $id = $profile->id;
        $user = User::find($id);
        $orders = $user->orders;
        $products = $orders->orderproduct();
        return view('userpage',compact('user', 'products'));

    }

    public function ordershome(){
        return view('ordershome');
    }
    // public function index(){
    //     $order = DB::table('users')->select('orders.id', 'users.name', 'orders.billing_country', 'orders.billing_address', 'orders.billing_email', 'orders.billing_total', 'order_product.order', )
    //     ->join('orders', 'user_id', '=', 'users.id')
    //     ->join('order_product', 'order_id', '=', 'orders.id')
    //     ->join('order_status', 'order_status.order_id', '=', 'order_product.order_id')
    //     ->get();
    //     return view('ordershome', ['orders'=>$order] );
    
    // }


    public function show(User $profile){
        $id = $profile->id;
        $user = User::find($id);
        $orders = OrderProduct::where('order_id', 'orders.id')->get();
        $o = DB::table('products')
            ->join('order_product', 'products.id','=','order_product.product_id')
            ->select('order_product.created_at','products.name', 'products.price', 'order_product.id')
            ->where('order_product.user_id', $user->id)
            ->get()->all();

        $user_os = DB::table('orders')
        ->join('order_product', 'orders.id','=', 'order_product.order_id')
        ->select('orders.*')
        ->where('order_product.user_id', $user->id)
        ->get()->all();
        $uo_filter = array();
        foreach($user_os as $user_order){
            if($user_order->user_id == $user->id){
                $uo_filter + ['user_id'=> $user_order->user_id, 'billing_total'=>$user_order->billing_email];
            }
        }

        return view('userpage',compact('user','o','user_os','uo_filter'));

    }
    public function returnOrder(OrderProduct $op){}

    /*public function getorder(Request $request, User $profile){
        $id = $profile->id;
        $user = User::find($id);
        $order = Order::find($request->user_id);
        #$products = $order->order_product;#
        $orders = OrderProduct::where('user_id', $user)->get();
        return view('userpage',compact('user', 'orders'));

    }*/








    

}
