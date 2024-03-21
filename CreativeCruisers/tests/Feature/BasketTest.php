<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class BasketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_load_basket_page(): void
    {
        $response = $this->get('/checkout');

        $response->assertStatus(200);
    }

    public function test_items_added_to_basket(){
        $product = new Product();
        $product->name = 'Sample Product';
        $product->price = 10.99;
        $product->description = 'test';
        $product->catergory = 'skateboard';
        $product->quantity = 10;
        $product->image = 'test';

        // Create a shopping cart instance
        $cart = new Cart();

        // Add the product to the cart

        // Assert that the product is added to the cart
        $this->assertTrue($cart->hasItem($product->id));
        $this->assertEquals(2, $cart->getItemQuantity($product->id));

    }
}
