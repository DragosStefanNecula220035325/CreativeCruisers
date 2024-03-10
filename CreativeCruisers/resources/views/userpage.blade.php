@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href = "css/userpage.css"/>
<link rel="stylesheet" type="text/css" href = "css/product_details.css"/>
<link rel="stylesheet" type="text/css" href = "css/components.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />

<div class="usermenu">
    <div class="userdetails">
        <h1>User Details</h1> 
        <p>Username: </p>
        <p>Email: </p>
        <div class="userbuttons">
            <button class="btn">Change Password</button>
            <button class="btn">Change Email</button>
        </div>
    </div>
    <div class="userproducts">
        <h1>Past Orders</h1> 

    </div>
</div>



@include ('footer')
@endsection