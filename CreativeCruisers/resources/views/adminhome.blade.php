@extends('header')
@section('content')



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">




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
                    <li><a href="{{ route('admin.home') }}">Home</a></li>
                    <li><a href="{{ route('admin_add') }}">Add</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
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
                        <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}</a> -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </div>
                    </li>
                    <li><a href="{{ route('logout') }}">
                            <h3>{{ Auth::user()->name }}</h3>
                        </a></li>
                    @endguest

                </ul>
            </nav>


        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


        @yield('content')


        <table class="table">
            <br>
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
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product['id'] }}</th>
                    <td><img src="/products/{{$product->id}}.png" alt="Placeholder" height=50 width=50></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>{{ $product['Stock_num'] }}</td>
                    <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td><a href="{{ route('product.delete', ['id' => $product->id]) }}"
                            class="btn btn-primary">Remove</a></td>


                    @endforeach
                </tr>
            </tbody>
        </table>


</body>

</html>

@endsection