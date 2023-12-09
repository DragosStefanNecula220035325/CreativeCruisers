@extends('header')
@section('content')
<link rel="stylesheet" type="text/css" href="css/product_page.css " />

<div class="row">
    <div class="col-1">
        <p> <a href="welcome" class="homeLink">Home</a> > Product Page</p>
        <h1>Shop Page</h1>
        <p>Let's build the skateboard you have always imagined.</p>
    </div>
</div>

@if(session('message'))
<div>xd</div>
@endif


<div id="product_page_interface">
    <div id="product_page_interface_body">

        <div id="filter_dropdown">
            <label>Filter By Category</label>
            <select name="product_categories" id="product_categories">
                <option value="Decks">Decks</option>
                <option value="Wheels">Wheels</option>
                <option value="Trucks">Trucks</option>
            </select>
            <button>Search</button>
        </div>

        <div id="product_page_interface_list">
            @foreach($products as $product)
            <div class="product-container">
                <div class="product">
                    <!-- Anchor tag here -->
                    <img src="{{$product['file']}}" alt="Placeholder">
                    <div class="label-container">
                        <div class="label1">NEW</div>
                        <div class="label2">-50%</div>
                    </div>
                    <form id="addToCart" method="post" action="{{route('cart.store')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$product['id']}}">
                        <!-- <input type="hidden" name="name" value="{{$product['name']}}">
                        <input type="hidden" name="price" value="{{$product['price']}}"> -->

                    <button class="add-basket add_to_basket">Add to Basket</button>
</form>
                </div>
                <div class="product_details">
                    <a href="{{ route('productDetails',$product->id) }}">
                        <h3 class="font_poppins">{{$product['name']}}</h3>
                    </a>
                    <p class="price font_poppins">£{{$product['price']}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div id="product_page_interface_footer">
            <button type="button" class="button_main button_big button_primary ">Show More!</button>
        </div>

    </div>
</div>
</div>
@include ('footer')
@endsection