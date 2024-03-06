<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\OrderStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function aboutus(){
        return view('aboutus');
    }

    public function orderindex(){
        $order = DB::table('order_product')
        ->join('orders', 'orders.id', '=', 'order_product.order_id')
        ->select('orders.id','orders.billing_country', 'orders.billing_address', 'orders.billing_email', 'orders.billing_total', 'order_product.order_id', 'order_product.product_id', 'order_product.quantity', 'order_product.status',)
        ->get();
        return view('processed', ['orders'=>$order] );



    
    }
    public function ordersindex(){
        $order = OrderProduct::all();
        return view('processed', ['orders'=>$order]);
    
    }


    public function orderedit($id){
        $order = OrderProduct::find($id);
        return view('processed', ['orders'=>$order]);
    }



    public function orderupdate(Request $request, $id){
        $order = OrderProduct::find($id);
        $order->product_id = $request->input('product_id');
        $order->status = $request->input('status');
        $order->quantity = $request->input('quantity');
        $order->update();
        return redirect(route('processed'));

    }

}
