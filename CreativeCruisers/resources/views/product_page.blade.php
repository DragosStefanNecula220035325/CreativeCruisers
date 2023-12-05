@extends('header')
@section('content')
<link rel="stylesheet" type="text/css" href="css/product_page.css " />
<div class="row">
    <div class="col-1">
        <p class="smalltxt"><a href="welcome" class="homeLink">Home</a> > Product Page</p>
        <h1 class="largetxt">Shop Page</h1>
        <p class="mediumtxt">Let's build the skateboard you have always imagined.</p>
    </div>
</div>
<!-- <div id="product_page_header">
    <div id="product_page_container">
        <img class="skateboardpic" src="/images/pexels-artem-podrez-4816757.jpg" alt="Skateboards">
        <div class="centered">
            <p class="smalltxt"><a href="welcome" class="homeLink">Home</a> > Product Page</p>
            <h1 class="largetxt">Shop Page</h1>
            <p class="mediumtxt">Let's build the skateboard you have always imagined.</p>
        </div>
    </div>
</div> -->

<div id="product_page_interface">
    <div id="product_page_interface_body">
        <div id="product_page_interface_header">


        </div>

        <div id="product_page_interface_list">
            @foreach($products as $product)
            <div class="product-container">
                <div class="product">
                    <img src="{{$product['file']}}" alt="Placeholder">
                    <div class="label-container">
                        <div class="new-label">NEW</div>
                        <div class="discount-label">-50%</div>
                        <button class="button_main button_small button_primary">Add to Basket</button>
                    </div>
                </div>
                <div class="product_details">
                    <h3 class="font_poppins">{{$product['name']}}</h3>
                    <p class="price font_poppins">{{$product['price']}}</p>
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
@endsection