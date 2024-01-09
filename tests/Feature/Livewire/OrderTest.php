<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CartSection;
use App\Livewire\OrderCreate;
use App\Models\Order;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

use function Pest\Livewire\livewire;

class OrderTest extends TestCase
{
    /** @test */
    public function create_order()
    {
        $product = Product::find(1);
                
        $item = item::create([
            'amount' => 1,
            'product_id' => 1,
        ]);

        $cart = [];
        session(['cart' => $cart]);

        livewire::test(CartSection::class)
        ->set('cart', $cart)            
        ->set('delivery', false)
        ->call('addToCart', $product)
        ->call('increaseQuantity', $item);
        $cart = session('cart');

        $orderCount = Order::count();

        livewire::test(OrderCreate::class, ['items' => $cart, 'delivery' => false])
        ->call('createOrder');

        $this->assertEquals($orderCount+1, Order::count());
    }

}
