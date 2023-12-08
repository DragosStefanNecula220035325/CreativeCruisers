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
                        <div class="label1">NEW</div>
                        <div class="label2">-50%</div>
                    </div>
                    <button class="add-basket">Add to Basket</button>
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