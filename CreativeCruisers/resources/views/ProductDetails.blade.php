@extends('header')
<base href="/public"/>
<link rel="stylesheet" type="text/css" href = "css/product_page.css"/>
<link rel="stylesheet" type="text/css" href = "css/nav_bar.css"/>
<link rel="stylesheet" type="text/css" href = "css/welcome_page.css"/>
<link rel="stylesheet" type="text/css" href = "css/general.css"/>
<link rel="stylesheet" type="text/css" href = "css/product_details.css"/>

@section('content')
<div class="row">
    <div class="col-1">
        <p> <a href="welcome" class="homeLink">Home</a> > Product Page > {{$product->name}}</p>
        <h1>Shop Page</h1>
        <p>Let's build the skateboard you have always imagined.</p>
    </div>
</div>
<div class="product-container">
        <div class="product">
            <!-- Anchor tag here -->
            <img src="products/{{$product->id}}.png" alt="Placeholder">
            <div class="label-container">
                <div class="label1">NEW</div>
                <div class="label2">-50%</div>
            </div>
            <div>{{ $stockLevel }}</div>

            if($product->quantity > 0){
                <form id="addToCart" method="post" action="{{route('cart.store')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$product['id']}}">
                    <!-- <input type="hidden" name="name" value="{{$product['name']}}">
                    <input type="hidden" name="price" value="{{$product['price']}}"> -->

                <button class="add-basket add_to_basket">Add to Basket</button>
                </form>
            }
        </div>
        <div class="product_details">
            <a href="{{ route('productDetails',$product->id) }}">
                <h3 class="font_poppins">{{$product['name']}}</h3>
            </a>
            <p class="price font_poppins">£{{$product['price']}}</p>
        </div>
</div>

@include('footer')
@endsection