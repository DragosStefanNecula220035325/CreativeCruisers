@extends('header')
<base href="/public"/>
<link rel="stylesheet" type="text/css" href = "css/product_details.css"/>
<link rel="stylesheet" type="text/css" href = "css/components.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />

<link rel="stylesheet" href="{{ asset('css/product_page.css') }}">
@section('content')

<div class="product_detail_body">
    <div class="product_details_main">
    <a href="{{ route('product_page') }}"class="gobackbutton"> < Go back</a>
    <div class="product-container">
                <div class="product">
                    <!-- Anchor tag here -->
                    <img src="products/{{$product->name}}.jpg" alt="Placeholder">
                    <div class="label-container">
                        <div class="label1">NEW</div>
                        <div class="label2">-50%</div>
                    </div>
                    <div>{{$stockLevel}}</div>
                    @if ($product->quantity > 0)
                        <form id="addToCart" method="post" action="{{route('cart.store')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$product['id']}}">
                            <!-- <input type="hidden" name="name" value="{{$product['name']}}">
                            <input type="hidden" name="price" value="{{$product['price']}}"> -->

                        <button class="add-basket add_to_basket">Add to Basket</button>
                        </form>
                    
                    @else
                        <div class = "out-of-stock">
                            <button class="add-basket add_to_basket outofstock">Out of Stock</button>
                        </div>
                    @endif
                </div>
                <div class="product_details">
                   
                        <h3 class="font_poppins">{{$product['name']}}</h3>
                    
                    <p class="price font_poppins">£{{$product['price']}}</p>
                </div>
            </div>
    </div>
    <div class="product_details_reviews">
       
        <h2> Reviews </h2>
            <div class="review">
                <p class="user"> Brosky </p>
                <p class="comment"> I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product </p>
            </div>
            <div class="review">
                <p class="user"> Brosky </p>
                <p class="comment"> I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product </p>
            </div>
            <div class="review">
                <p class="user"> Brosky </p>
                <p class="comment"> I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product I had great fun with this product </p>
            </div>


    </div>
    </div>

</div>

<div class="leave_a_review">
    <h2>Leave a review </h2>
    <form method="POST" action="{{ url('productDetails/' . $product->id) }}"> 
        {{ csrf_field() }}
        <input type="hidden" name="product_id" id="product_id" value="{{$product['id']}}">
        <label for="name" class="label">name</label>
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="name" required autocomplete="name" autofocus>
            <label for="text" class="label">review</label>
            <textarea type="text" id="review" name="review" class="review_input"> </textarea>
            <div class="rating">
            <input id="rating1" type="radio" name="rating" value="1">
            <label for="rating1">1</label>
            <input id="rating2" type="radio" name="rating" value="2">
            <label for="rating2">2</label>
            <input id="rating3" type="radio" name="rating" value="3">
            <label for="rating3">3</label>
            <input id="rating4" type="radio" name="rating" value="4">
            <label for="rating4">4</label>
            <input id="rating5" type="radio" name="rating" value="5">
            <label for="rating5">5</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>





@include('footer')
@endsection