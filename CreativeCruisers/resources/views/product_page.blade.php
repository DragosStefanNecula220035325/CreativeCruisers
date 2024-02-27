@extends('header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />

<div class="row">
    <div class="col-1">
        <p> <a href="{{ route('home') }}" class="homeLink">Home</a> > Product Page</p>
        <h1>Shop Page</h1>
        <p>Let's build the skateboard you have always imagined.</p>
    </div>
</div>

<div id="search_box">
    <form action="{{ route('products.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search products..." value="{{ request()->input('query') }}">
        <button type="submit">Search</button>
    </form>
</div>

<div id="product_page_interface">
    <div id="product_page_interface_body">

        <div id="filter_dropdown">
            <form id="filterForm" action="{{ route('products.showByCategory') }}" method="GET">
                @csrf
                <label>Filter By Category</label>
                <select name="category" id="product_categories">
                    <option value="">All</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div id="product_page_interface_list">
            @foreach($products as $product)
                <div class="product-container">
                    <div class="product">
                        <img src="products/{{$product->id}}.png" alt="Placeholder">
                        <div class="label-container">
                            <div class="label1">NEW</div>
                            <div class="label2">-50%</div>
                        </div>
                        <form id="addToCart" method="post" action="{{route('cart.store')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$product['id']}}">
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

        <!-- <div id="product_page_interface_footer">
            <button type="button" class="button_main button_big button_primary">Show More!</button>
        </div> -->

    </div>
</div>
@include ('footer')
@endsection
