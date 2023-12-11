@extends('header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/welcome_page.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_page.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@php
    $token = csrf_token();
@endphp

<div class="row">
    <div class="col-1">
        <h1>Create your own SkateBoard!</h1>
        <p>Make your skateboard your own, with customization like never before!</p>
        <a href="customise" class="btn">Try it now! &#8594;</a>
    </div>
</div>

<div class="categories">
    <div class="row_categories">
        <div class="category_column">
        <a href="{{ route('products.showByCategory', ['_token' => 'JCZKINEQ5DGPSfysts5DyzQ9fMF6b0IO2Di0IX20', 'category' => 'Decks']) }}"</a>
                <img src="/images/pexels-cottonbro-studio-10118266.jpg" alt="Decks Image">
                <h3>Decks</h3>
            </a>
        </div>
        <div class="category_column">
            <a href="{{ route('products.showByCategory', ['_token' => 'JCZKINEQ5DGPSfysts5DyzQ9fMF6b0IO2Di0IX20', 'category' => 'Wheels']) }}"">
                <img src="/images/pexels-aman-jakhar-1134162.jpg" alt="Wheels Image">
                <h3>Wheels</h3>
            </a>
        </div>
        <div class="category_column">
            <a href="{{ route('products.showByCategory', ['_token' => 'JCZKINEQ5DGPSfysts5DyzQ9fMF6b0IO2Di0IX20', 'category' => 'Trucks']) }}"">
                <img src="/images/pexels-griffin-wooldridge-5224914.jpg" alt="Trucks Image">
                <h3>Trucks</h3>
            </a>
        </div>
    </div>
</div>
<!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h2>Featured Products</h2>

    <div class="row_featured_products">
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product1 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product1</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product2 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product2</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product3 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product3</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product4 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product4</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product5 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product5</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product6 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product6</h4>
        </div>
    </div>
</div> -->


@include ('footer')
@endsection