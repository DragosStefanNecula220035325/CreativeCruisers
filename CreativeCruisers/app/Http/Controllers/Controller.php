<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Review;
use App\Models\ProductReview;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function aboutus(){
        return view('aboutus');
    }

    function addreview(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "review"=> "required",
            ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['review'] = $request->review;
            Review::create($data);
            return redirect(route("aboutus"))->with("success");

        }

        function review(){
            return view("aboutus");
        }


    public function orderindex(){
        $order = DB::table('order_product')
        ->join('orders', 'orders.id', '=', 'order_product.order_id')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->select('order_product.*', 'orders.billing_total', 'orders.billing_country', 'orders.billing_address', 'orders.billing_email', 'users.name')
        ->get();
        return view('processed', ['orders'=>$order] );



    
    }
    public function ordersindex(){
        $order = OrderProduct::all();
        return view('processed', ['orders'=>$order]);
    
    }


    public function orderedit($id){
        $table1Record = OrderProduct::findOrFail($id);
        $order = $table1Record->order;
        return view('processed', compact('table1Record', 'order'));
    }



    public function orderupdate(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->product_id = $request->input('product_id');
        $order->status = $request->input('status');
        $order->quantity = $request->input('quantity');
        $order->update();
        return redirect(route('processed'));

    }



    function addproductreview(Request $request){
        $request->validate([
            "name"=> "required",
            "review"=> "required",
            "rating"=> "required",
            ]);
            $data['product_id'] = $request->product_id;
            $data['name'] = $request->name;
            $data['review'] = $request->review;
            $data['rating'] = $request->rating;
            ProductReview::create($data);
            return redirect(route("product_page"))->with("success","product added");

        }

        function productreview(){
            return view("product_page");
        }

}
