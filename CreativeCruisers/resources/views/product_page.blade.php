@extends('header')
@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/nouislider"></script>
<script src="https://cdn.jsdelivr.net/npm/wnumb/wNumb.js"></script>
</head>
<base href="/public"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/product_page.css') }}" />


<div class="row">
    <div class="col-1">
        <p> <a href="welcome" class="homeLink">Home</a> > Product Page</p>
        <h1>Shop Page</h1>
        <p>Let's build the skateboard you have always imagined.</p>
    </div>
</div>

<div id="product_page_interface">
    <div id="product_page_interface_body">

    


<div id="price-slider"></div>
        <div class="price_buttons">
            <p>Price: £<span id="price-lower"></span> - £<span id="price-upper"></span></p>
            <button id ="price-filter-button" onclick="applyPriceFilter()">Apply Price Filter</button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
    var urlParams = new URLSearchParams(window.location.search);
    var minPrice = urlParams.get('min_price') || 0; // Use the min_price from URL if it exists, otherwise default to 0
    var maxPrice = urlParams.get('max_price') || 100; // Use the max_price from URL if it exists, otherwise default to 100

    var slider = document.getElementById('price-slider');
    noUiSlider.create(slider, {
        start: [minPrice, maxPrice], // Use minPrice and maxPrice for the slider start values
        connect: true,
        range: {
            'min': 0,
            'max': 100
        },
        step: 1,
        tooltips: [wNumb({decimals: 0}), wNumb({decimals: 0})],
    });

    slider.noUiSlider.on('update', function(values, handle) {
        document.getElementById('price-lower').innerHTML = values[0];
        document.getElementById('price-upper').innerHTML = values[1];
    });

    window.applyPriceFilter = function() {
        var prices = slider.noUiSlider.get();
        window.location.href = `{{ url('/products/filterByPrice') }}?min_price=${prices[0]}&max_price=${prices[1]}`;
    };
});

</script>



<div class="interface">
<div class="search_class">
    <form action="{{ route('products.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search products">
        <button type="submit">Search</button>
    </form>
</div>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product_categories').on('change', function() {
            $('#filterForm').submit(); // Submit the form when the select value changes
        });

        $('#filterForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize(); // Serialize form data
            var url = $(this).attr('action') + '?' + formData; // Get form action URL with query parameters

            $.ajax({
                type: 'GET',
                url: url,
                data: formData,
                success: function(response) {
                    $('#product_page_interface_list').html($(response).find('#product_page_interface_list').html()); // Replace the product list with the updated content
                    $('#product_page_interface_footer').html($(response).find('#product_page_interface_footer').html()); // Replace the footer with the updated content

                    // Update URL using history.pushState()
                    history.pushState({}, '', url);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
        </div>

        <div id="product_page_interface_list">
        @foreach($products as $product)
    <div class="product-container">
        <!-- Anchor tag here -->
        <a href="{{ route('productDetails', $product->id) }}">
            <div class="product">
                <img src="products/{{$product->name}}.jpg" alt="Placeholder">
                <div class="label-container">
                    @if ($product->quantity < 3)
                    <div class="label1">Low Stock</div>
                    @endif
                    <!-- <div class="label2">-50%</div> -->
                </div>
                @if ($product->quantity > 0)
                    <form id="addToCart" method="post" action="{{route('cart.store')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button class="add-basket add_to_basket">Add to Basket</button>
                    </form>
                @else
                    <div class="out-of-stock">
                        <button class="add-basket add_to_basket outofstock">Out of Stock</button>
                    </div>
                @endif
            </div>
        </a> <!-- Anchor tag close here -->
        <div class="product_details">
            <a href="{{ route('productDetails', $product->id) }}">
                <h3 class="font_poppins">{{$product->name}}</h3>
            </a>
            <p class="price font_poppins">£{{$product->price}}</p>
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