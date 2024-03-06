@extends('header')
@section('content')



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>




<body>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins') }}" rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <div class="header">

      

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


        @yield('content')


        <table class="table">
            <br>
            <thead>

                <tr>
                    <th scope="col">OrderID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>


                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td><img src="/products/{{$order->product_id}}.png" alt="Placeholder" height=50 width=50></td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->billing_country }}</td>
                    <td></td>
                    <td>{{ $order->billing_address }}</td> 
                    <td>{{ $order->billing_email }}</td>
                    <td>{{ $order->billing_total }}</td> 
                    <td>{{ $order->status }}</td>



                    @include('modal.orderprocess')
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Process{{$order->id}}" data-whatever="orderprocess">Process</button></td>
                    @include('modal.orderreject')
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Cancel{{$order->id}}" data-whatever="ordercancel">Cancel</button></td>

                    @endforeach
                </tr>
            </tbody>
        </table>


</body>

</html>

@endsection