
@extends('header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body>
<link rel="stylesheet" type="text/css" href = "css/userpage.css"/>
<link rel="stylesheet" type="text/css" href = "css/product_details.css"/>
<link rel="stylesheet" type="text/css" href = "css/components.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />
<link rel="stylesheet" href="css/adminHome.css">


<div class="usermenu">
    <div class="userdetails">
        <h1>User Details</h1> 
        <p>Username: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <div class="userbuttons">
            <a class="btn"  href="{{ route('password.request') }}">Change Password</a>
           
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
                @foreach($o as $product)
                    <tr>
                        <td><img src="products/{{$product->id}}.png" alt="Placeholder" height=50 width=50></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <form method="get" id = "returnOrder" action="{{ route('order.return', $product->id) }}">
                                @csrf
                            <input type="hidden" type="orderProductID" name="orderProductID" value="{{$product->id}}">
                            <input type ="hidden" type ="orderProductQty" name = "orderProductQty" value="{{$product->quantity}}">
                            <button type="submit" class="adminButton">Return</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                    

                <!--<tr>
                    <td><img src="products/1.png" alt="Placeholder" height=50 width=50></td>
                    <td>Skateboard</td>
                    <td>20$</td>
                    <td>27/11/2000</td>
                    <td><a href="" class="btn btn-primary">Return</a></td>  
                </tr>-->
                
      
            </tbody>
        </table>
        </div> 
    </div>
</div>




    
</body>
</html>

@include ('footer')
@endsection




