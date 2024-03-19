@extends('header')
@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/nouislider"></script>
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
<p>
    Price: £<span id="price-lower"></span> - £<span id="price-upper"></span>
</p>
<button onclick="applyPriceFilter()">Apply Price Filter</button>

<script>
    var slider = document.getElementById('price-slider');

    noUiSlider.create(slider, {
        start: [0, 100],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    });

    var priceLower = document.getElementById('price-lower'),
        priceUpper = document.getElementById('price-upper');

    slider.noUiSlider.on('update', function (values, handle) {
        if (handle) {
            priceUpper.innerHTML = Math.round(values[handle]);
        } else {
            priceLower.innerHTML = Math.round(values[handle]);
        }
    });

    function applyPriceFilter() {
        var prices = slider.noUiSlider.get();
        var minPrice = Math.round(prices[0]);
        var maxPrice = Math.round(prices[1]);

        
        window.location.href = `{{ url('/products/filterByPrice') }}?min_price=${minPrice}&max_price=${maxPrice}`;
    }
</script>


<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="query" placeholder="Search products">
    <button type="submit">Search</button>
</form>

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
                <img src="products/{{$product->id}}.png" alt="Placeholder">
                <div class="label-container">
                    <div class="label1">NEW</div>
                    <div class="label2">-50%</div>
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