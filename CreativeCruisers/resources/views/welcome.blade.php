@extends('header')
@section('content')
<link rel="stylesheet" href="css/welcome_page.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="row">
    <div class="col-1">
        <h1>Create your own SkateBoard!</h1>
        <p>Make your skateboard your own, with customisation like never before!</p>
        <a href="customise" class="btn">Try it now! &#8594;</a>
    </div>
</div>

<div class="categories">
    <div class="row_categories">
        <div class="category_column">
            <img src="https://via.placeholder.com/200x150" alt="Decks Image">
            <h3>Decks</h3>
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
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product1</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product2 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product2</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product3 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product3</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product4 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product4</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product5 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product5</h4>
        </div>
        <div class="featured_products">
            <img src="https://via.placeholder.com/200x150" alt="Product6 Image">
            <button class="add_to_basket">Add to Basket</button>
            <h4>Product6</h4>
        </div>
    </div>
</div>

<footer>
    <div class="container wrap">
        <div class="footer_row">

            <div class="footer_column">
                <div class="footer_widget">
                    <h2 class="widget_title">About</h2>
                    <p>Creative Cruisers is home for the imaginative and daring <br>
                        individuals to craft bespoke masterpieves and channel their unique designs onto custom boards.
                    </p>
                    <div class="cards">
                        <i class="fa fa-cc-amex"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                        <i class="fa fa-cc-mastercard"></i>
                    </div>
                </div>
            </div>


            <div class="footer_column">
                <div class="footer_widget">
                    <h2 class="widget_title">Contact Info</h2>
                    <p>Contact Us: </p>
                    <div class="contact_address">
                        <i class="fa fa-map-pin"></i> Address : B4 7ET, Birmingham, Aston Street.
                    </div>

                    <div class="contact_number">
                        <i class="fa fa-phone-square"></i> Phone : 0121 01210121
                    </div>

                    <div class="contact_email">
                        <i class="fa fa-envelope	"></i> Email : support@creativecruisers.com

                    </div>

                </div>
            </div>


        </div>
    </div>

</footer>


@endsection