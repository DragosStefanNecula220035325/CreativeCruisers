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
                    <img src="products/{{$product->id}}.png" alt="Placeholder">
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

        <div class="review_input">
        </div>
    </div>
    </div>

</div>

<div class="leave_a_review">
    <h2>Leave a review </h2>
    <form> 
    <label for="name" class="label">{{ __('Name') }}</label>
        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <label for="text" class="label">{{ __('Review') }}</label>
        <textarea type="text" class="review_input"> </textarea>
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
        <a href="" class="btn">Send Review!</a>
    </form>
</div>





@include('footer')
@endsection