<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use App\Http\Controllers\Order;
use App\Models\Order as ModelsOrder;

class AuthManager extends Controller
{
    function login() {
        return view("login");
    }

    function registration(){
        return view("registration");
    }

    function loginPost(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required"
        ]);
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect(route("home"));

    }
    return redirect(route("login"))->with("error","login details are incorrect");
}
    function registrationPost(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required|email|unique:users",
            "name"=> "required"
            ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            if(!$user){
                return redirect(route("registration"))->with("error","registration failed, try again");
            }
            return redirect(route("login"))->with("success","registration success");
            
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route("login"));
    }


    public function userpage(User $profile, ModelsOrder $o){   
        $id = $profile->id;
        $user = User::find($id);
        $order = Order::find($user);
        $products = $order->products;
   
        return view('userpage',compact('user'));
    }

}
