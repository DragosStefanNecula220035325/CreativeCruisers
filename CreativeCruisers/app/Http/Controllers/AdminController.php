<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class AdminController extends Controller
{

    public function admincustomerdetails(){
        return view('admin_customerdetails');
    }

    public function index(){
        $user = DB::table('users')->where('is_admin', 0)->get();
        return view('admin_customerdetails', ['users'=>$user]);
    
    }

    public function customerdelete($id){
        $data = User::find($id);
        $data->delete();
        return redirect(route('admin_customerdetails'));
    }

    public function customeredit($id){
        $user = User::find($id);
        return view('customer_edit', ['users'=>$user]);
    }
    public function customerupdate(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect(route('admin_customerdetails'))->with('Data updated successfully');

    }

    function customeradd(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['password'] = Hash::make($data['password']);
        
            User::create($data);
            return redirect(route("admin_customerdetails"))->with("success","user added");

        }



}
