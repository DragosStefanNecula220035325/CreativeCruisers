@extends('header')
@section('content')
<link rel="stylesheet" type="text/css" href="css/product_page.css "/> 
    <div id="product_page_header">
            <div id="product_page_container">
                <img class = "skateboardpic" src="/images/pexels-artem-podrez-4816757.jpg" alt="Skateboards">
                <div class="centered">
                    <p class="smalltxt">Home > Product Page</p>
                    <h1 class="largetxt">Shop Page</h1>
                    <p class="mediumtxt">Let's build the skateboard you have always imagined.</p>
                </div>
            </div>
    </div>

    <div id="product_page_interface">
        <div id="product_page_interface_body">
            <div id="product_page_interface_header">

            <!-- <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div> -->

            </div>

            <div id="product_page_interface_list">
                @foreach($products as $product)
                <div class="product">
                    <img src="{{$product['file']}}" alt="Placeholder">
                    <div class="product_details">
                        <h2 class="font_poppins">{{$product['name']}}</h2>
                        <p class="price font_poppins">{{$product['price']}}</p>
                        <p class="price font_poppins">{{$product['description']}}</p>
                        <button class="button_main button_small button_primary">Add to Basket</button>
                    </div>
                </div>
                @endforeach
            </div>



            <div id="product_page_interface_footer"><br>
            <button type="button" class="button_main button_big button_primary ">Show More!</button>
            </div>
                
            

        </div>
    </div>
@endsection