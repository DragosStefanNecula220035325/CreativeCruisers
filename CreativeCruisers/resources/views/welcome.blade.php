<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="css/welcome_page.css">


</head>

<body>


    <div class="header">

        <div class="navbar">

            <div class="logo">
                <img src="images/creative_logo.png" width="125px">
            </div>
            <div class="title">
                <img src="images/creative_cruisers_title.png" width="350px" style="margin-left: 50px">
            </div>

            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="product_page">Products</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href=""><ion-icon name="basket-outline"></ion-icon></a><span class="basket_count">0</span>
                    </li>
                </ul>
            </nav>


        </div>

        <div class="row">
            <div class="col-1">
                <h1>Create your own SkateBoard!</h1>
                <p>Make your skateboard your own, with customisation like never before!</p>
                <a href="" class="btn">Try it now! &#8594;</a>
            </div>
        </div>

    </div>



    <div class="categories">
        <div class="row_categories">
            <div class="category_column">
                <img src="https://via.placeholder.com/200x150" alt="Decks Image">
                <h3>Decks</h3>
                <button class="add_to_basket">Add to Basket</button>
            </div>
            <div class="category_column">
                <img src="https://via.placeholder.com/200x150" alt="Wheels Image">
                <h3>Wheels</h3>
            </div>
            <div class="category_column">
                <img src="https://via.placeholder.com/200x150" alt="Trucks Image">
                <h3>Trucks</h3>
            </div>
        </div>

        <h2>Featured Products</h2>

        <div class="row_featured_products">
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product1 Image">
                <h4>Product1</h4>
            </div>
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product2 Image">
                <h4>Product2</h4>
            </div>
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product3 Image">
                <h4>Product3</h4>
            </div>
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product4 Image">
                <h4>Product4</h4>
            </div>
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product5 Image">
                <h4>Product5</h4>
            </div>
            <div class="featured_products">
                <img src="https://via.placeholder.com/200x150" alt="Product6 Image">
                <h4>Product6</h4>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>


</html>

<script>
    const basketIcon = document.querySelector('.basket_icon');
    const basketCount = document.querySelector('.basket_count');

    let itemCount = 0;

    function updateBasketCount() {
        basketCount.textContent = itemCount;
        basketCount.classList.add('added');

        setTimeout(() => {
            basketCount.classList.remove('added')
        }, 300);
    }

    const addToBasketButtons = document.querySelectorAll('.add_to_basket');
    addToBasketButtons.forEach(button => {
        button.addEventListener('click', () => {
            itemCount++;
            updateBasketCount();
        })

    });

</script>