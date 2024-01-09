<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CartSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use App\Models\Product;
use App\Models\Item;
use Tests\TestCase;
use Illuminate\Testing\Assert;

class CartSectionTest extends TestCase
{
    /** @test */
    function renders_successfully()
    {
        Livewire::test(CartSection::class)
            ->assertStatus(200);
    }
    
    /** @test */
    function add_to_cart()
    {
        $product = Product::create([
            'name' => 'Cheese vegan pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 19.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);
        $cart = $this->resetCart();

        livewire::test(CartSection::class)
        ->set('cart', $cart)            
        ->set('delivery', false)
        ->call('addToCart', $product)
        ->assertCount('cart', 1);

        $this->resetCart();
    }

    /** @test */
    public function increaseQuantity()
    {
        
        $cart = $this->resetCart();
        
        $product = Product::find(1);

        $item = item::create([
            'amount' => 1,
            'product_id' => 1,
        ]);

        livewire::test(CartSection::class)
        ->set('cart', $cart)            
        ->set('delivery', false)
        ->call('addToCart', $product)
        ->call('increaseQuantity', $item);

        $cart = session('cart');

        $this->assertEquals(2, $cart[0]['quantity']);

        $this->assertNotEquals(5, $cart[0]['quantity']);

        $this->resetCart();
    }


    public function resetCart()
    {
        $cart = session('cart');
        $cart = [];
        $this->persistCart($cart);
        return $cart;
    }


    protected function persistCart($cart)
    {
        session(['cart' => $cart]);
    }
}
