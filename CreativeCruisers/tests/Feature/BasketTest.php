<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;

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

    public function test_add_items(){
        $product = new Product();
        $product->name = 'Sample Product';
        $product->price = 10.99;
        $product->description = 'test';
        $product->category = 'skateboard';
        $product->id=1;

        // Add the product to the cart
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');
        // Assert that the product is added to the cart
        $this->assertEquals(1, Cart::instance('cart')->count());
    }

    public function test_remove_items(){
        $product = new Product();
        $product->name = 'Sample Product';
        $product->price = 10.99;
        $product->description = 'test';
        $product->category = 'skateboard';
        $product->id=1;

        // Add the product to the cart
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');

        //get item
        $first=Cart::instance('cart')->content()->first();

        // Add the remove from the cart
        Cart::instance('cart')->remove($first->rowId);

        // Assert that the product is added to the cart
        $this->assertEquals(0, Cart::instance('cart')->count());
    }

    public function test_destroy_cart(){
        $product = new Product();
        $product->name = 'Sample Product';
        $product->price = 10.99;
        $product->description = 'test';
        $product->category = 'skateboard';
        $product->id=1;

        // Add the product to the cart
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');

      
        //destroy cart
        Cart::instance('cart')->destroy();
        
        // Assert that the product is added to the cart
        $this->assertEquals(0, Cart::instance('cart')->count());
    }


    public function test_check_subtotal(){
        $product = new Product();
        $product->name = 'Sample Product';
        $product->price = 10.99;
        $product->description = 'test';
        $product->category = 'skateboard';
        $product->id=1;

        // Add the product to the cart
        Cart::instance('cart')->add($product->id, $product->name, 1,$product->price)->associate('App/Models/Product');

        // Assert that the product is added to the cart
        $this->assertEquals(10.99, Cart::instance('cart')->subtotal());
    }
}
