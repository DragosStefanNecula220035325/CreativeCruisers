@extends('header')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="css/adminHome.css">
<body>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins') }}" rel='stylesheet'>
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
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


        @yield('content')
        
    <div class="scroller">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock Number</th>
                    <th scope="col">Options</th>
                    <th scope="col"><a href="{{ route('admin_add') }}">Add</a></th>
                </tr>
            </thead>
<!--             <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product['id'] }}</th>
                    <td><img src="/products/{{$product->id}}.png" alt="Placeholder" height=50 width=50></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>{{ $product['Stock_num'] }}</td>
                    <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-primary">Remove</a></td>  
                </tr>
                @endforeach
            </tbody> -->
            <tbody>
            @php
            $nostock = 0;
            $lowstock = 0;
            @endphp
            @foreach($products as $product)
                    @if($product['quantity'] == 0)
                        <tr>
                            <th scope="row">{{ $product['id'] }}</th>
                            <td><img src="{{ asset($product->image) }}" alt="Placeholder" height=50 width=50></td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-primary">Remove</a></td>
                        </tr>
                        @php
                        $nostock = 1;
                        @endphp
                    @endif
                @endforeach

                @if($nostock)
                <tr class="divisionLine">
                    <td colspan="9">
                        <i class="fa fa-exclamation-circle "></i> <p>Caution: Items above have no stock</p>
                    </td>
                </tr>
                @endif

                @foreach($products as $product)
                    @if($product['quantity'] < 3 && $product['quantity'] > 0)
                        <tr>
                            <th scope="row">{{ $product['id'] }}</th>
                            <td><img src="{{ asset($product->image) }}" alt="Placeholder" height=50 width=50></td>
                            <td>{{ $product['name'] }}{{ $product['image'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-primary">Remove</a></td>
                        </tr>
                        @php
                        $lowstock = 1;
                        @endphp
                    @endif
                    
                @endforeach

                @if($lowstock)
                <tr class="divisionLine">
                    <td colspan="9">
                        <i class="fa fa-exclamation-circle "></i> <p>Caution: Items above are low stock</p>
                    </td>
                </tr>
                @endif


                @foreach($products as $product)
                    @if($product['quantity'] >= 3)
                        <tr>
                            <th scope="row">{{ $product['id'] }}</th>
                            <td><img src="{{ asset($product->image) }}" alt="Placeholder" height=50 width=50></td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-primary">Remove</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>
    </div>

</body>

</html>

@endsection