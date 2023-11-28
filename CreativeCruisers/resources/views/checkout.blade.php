@extends('header')
@section('content')
<link rel="stylesheet" href="css/checkout.css">

<div class="checkout-container">
        <div class="main-section">
            <h2>Delivery Information</h2>
            <form>
                <label for="country">Country:</label>
                <select id="country" name="country">
                    <option value="uk">United Kingdom</option>
                    <option value="usa">United States of America</option>
                    <option value="germany">Germany</option>
                    <option value="france">France</option>
                    <option value="japan">Japan</option>
                    <option value="italy">Italy</option>
                    <option value="canada">Canada</option>
                </select>

                <label for="address">Delivery Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="delivery-options">Delivery Options:</label>
                <select id="delivery-options" name="delivery-options">
                    <option value="special">Royal Mail Special Delivery Guaranteed by 9am</option>
                    <option value="1st">Royal Mail 1st Class</option>
                    <option value="2nd">Royal Mail 2nd Class</option>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="payment-options">Payment Options:</label>
                <select id="payment-options" name="payment-options">
                    <option value="credit">Credit and Debit card</option>
                    <option value="bnpl">Buy now, pay later</option>
                    <option value="paypal">PayPal</option>                    
                </select>

                <button type="button" onclick="Payment()">Complete Payment</button>
            </form>
        </div>

        <div class="item-details-section">
            <h2>Item Details</h2>
            <div class="item-details">
            <img src="https://via.placeholder.com/120x120" alt="Item 1">
                <div class="item-info">
                    <p>Description:</p>
                    <p>Wheel 2</p>
                    <p>Quantity: 2</p>
                    <p>Subtotal: £23.34</p>
                </div>
            </div>

            <div class="item-details">
            <img src="https://via.placeholder.com/120x120" alt="Item 2">
                <div class="item-info">
                    <p>Description:</p>
                    <p>Skateboard 1</p>
                    <p>Quantity: 1</p>
                    <p>Subtotal: £25.70</p>
                </div>
            </div>
            <h3>Order Total: £49.04</h3>
        </div>
    </div>

    <script>
        function Payment() {
            alert('Payment successful!');
        }
    </script>
@endsection