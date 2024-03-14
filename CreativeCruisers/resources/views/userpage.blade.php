@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href = "css/userpage.css"/>
<link rel="stylesheet" type="text/css" href = "css/product_details.css"/>
<link rel="stylesheet" type="text/css" href = "css/components.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />
<link rel="stylesheet" href="css/adminHome.css">
<div class="usermenu">
    <div class="userdetails">
        <h1>User Details</h1> 
        <p>Username: {{Auth::user()->name}} </p>
        <p>Email: {{Auth::user()->email}} </p>
        <div class="userbuttons">
            <button class="btn" onclick="location.href='{{ route('password.request') }}'">Change Password</button>
            <button class="btn">Change Email</button>
        </div>
    </div>
    <div class="userproducts">
        <h1>Past Orders</h1> 
        <div class="pastorderlist">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Ordered On</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><img src="products/1.png" alt="Placeholder" height=50 width=50></td>
                    <td>Skateboard</td>
                    <td>20$</td>
                    <td>27/11/2000</td>
                    <td><a href="" class="btn btn-primary">Return</a></td>  
                </tr>
                
      
            </tbody>
        </table>
        </div> 
    </div>
</div>



@include ('footer')
@endsection