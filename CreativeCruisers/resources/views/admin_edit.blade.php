@extends('header')
@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="css/adminEdit.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Creative Cruisers</title>

</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins') }}" rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    @yield('content')
    <div class="header">

<div class="navbar">

    <div class="logo">
        <img src="/images/creative_logo.png" width="125px">

    </div>
    <div class="title">
        <p>Creative Cruisers</p>
    </div>

    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('admin_customerdetails') }}">Customer details</a></li>
            <li><a href="{{ route('processed') }}">Orders</a></li>

            @guest
            @if (Route::has('login'))
            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                    </form>
                </div>
            </li>
            <li><a href="{{ route('admin.home') }}">
                    <h3>{{ Auth::user()->name }}</h3>
                </a></li>
            @endguest

        </ul>
    </nav>


</div>



    <div class="admin-container"> 

        <h3>Edit Product</h3>

        <form method="POST" action="{{ url('update/' . $products->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')

            <div class="form-group">
                <label for="file">File Input</label>
                <input type="file" class="form-control-file" id="file" name="file" value=<img
                    src="/products/{{$products->id}}.png" alt="Placeholder" height=50 width=50>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="name of product" required autocomplete="name" value="{{ $products->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    placeholder="price of product" required autocomplete="price" value="{{ $products->price }}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" rows="3" required
                    autocomplete="description">{{ $products->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">    
                <label for="category">Category</label>            
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="category"
                    name="category">
                    <option selected>{{ $products->category }}</option>
                    <option>Decks</option>
                    <option>Trucks</option>
                    <option>Wheels</option>
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="price">Stock Number</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="Stock_num"
                    name="Stock_num" placeholder="Stock number" required autocomplete="stock"
                    value="{{ $products->quantity }}">
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</body>

</html>
@endsection