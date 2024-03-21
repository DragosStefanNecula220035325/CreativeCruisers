<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Creative Cruisers</title>

</head>

<body>
    <base href="/public"/>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/components.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('product_page') }}">Products</a></li>
                    <li><a href="{{ url('aboutus') }}">About Us</a></li>

                    
                    
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
                    @if (auth()->user()->is_admin == 1)
                    <li><a href="{{ route('admin.home') }}">
                            <h3>{{ Auth::user()->name }}</h3>
                        </a></li>
                    @else
                    <li><a href="{{ route('user.profile', ["profile" => Auth::user()->id]) }}">
                            <h3>{{ Auth::user()->name }}'s Profile</h3>
                        </a></li>
                    @endif
                    @endguest




                    <li><a href="/cart"><ion-icon name="basket-outline"></ion-icon></a><span class="basket_count">{{
                            Cart::instance('cart')->count() }}</span>

                    </li>
                </ul>
            </nav>


        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




        <script>
            // const basketIcon = document.querySelector('.basket_icon');
            // const basketCount = document.querySelector('.basket_count');

            // let itemCount = 0;

            // function updateBasketCount() {
            //     basketCount.textContent = itemCount;
            //     basketCount.classList.add('added');

            //     setTimeout(() => {
            //         basketCount.classList.remove('added')
            //     }, 300);
            // }

            // const addToBasketButtons = document.querySelectorAll('.add_to_basket');
            // addToBasketButtons.forEach(button => {
            //     button.addEventListener('click', () => {
            //         itemCount++;
            //         updateBasketCount();
            //     })

            // });

        </script>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>