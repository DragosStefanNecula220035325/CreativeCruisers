<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function getOrderDetails(Request $request){

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




    public function getorder(){
        return view('ordershome');

    }








    

}
