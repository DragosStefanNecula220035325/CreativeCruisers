@extends('header')
@section('content')



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>




<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins') }}" rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/processed.css">
    <div class="header">

      

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


        @yield('content')


        <div class="scroller">
            <table class="table">
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
                            <td><button type="button" class="adminButton" data-toggle="modal" data-target="#Process{{$order->id}}" data-whatever="orderprocess">Process</button></td>
                            @include('modal.orderreject')
                            <td><button type="button" class="adminButton" data-toggle="modal" data-target="#Cancel{{$order->id}}" data-whatever="ordercancel">Cancel</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


</body>

</html>

@endsection