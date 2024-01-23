<?php

namespace Tests\Feature\Livewire;

use App\Livewire\MenuSection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\PizzaStore;
use App\Models\Menu;
use App\Models\Zipcode;
use App\Models\DeliveryChecker;
use App\Models\menu_product;

use function PHPUnit\Framework\assertEquals;

class MenuSectionTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function renders_successfully()
    {
        $zipcode = Zipcode::create(
            [
                'zipcode' => 48084,
                'city' => "New Port City"
            ]
        ); 

        $pizzaStore =  PizzaStore::create([
            'location' => 'ip store',
            'user_id' => 2,
        ]);

        DeliveryChecker::create(
            [
                'zipcode_id' => $zipcode->id,
                'pizza_store_id' => $pizzaStore->id
            ]
        );

        $menu = Menu::create([
            'menu_name' => 'Ip Menu',
            'is_active' => 1,
            'pizza_store_id' => $pizzaStore->id,
        ]);

        menu_product::create([
            'menu_id' => $menu->id,
            'product_id' => 1,
        ]);

        Livewire::test(MenuSection::class, ['ip' => "67.97.38.151"])     
            ->assertSee('menu')
            ->assertSee('mainCategory');
            // ->assertSee('found');
    }

    /** @test */
    public function get_pizza_store_wrong()
    {

        $component = Livewire::test(MenuSection::class, ['ip' => "543.97.38.38939"]);

        assertEquals($component->found, false);

    }

    /** @test */
    public function set_active_menu_from_pizzastore()
    {
        try
        {
        // Create the records before test
        $pizzaStore =  PizzaStore::create([
            'location' => 'virkligspecfikmegetrandomnavn399239029',
            'user_id' => 2,
        ]);

        $menu = Menu::create([
            'menu_name' => 'Test Menu',
            'is_active' => 1,
            'pizza_store_id' => $pizzaStore->id,
        ]);

        // get the component.
        $component = livewire::test(MenuSection::class)
        ->call('setMenuFromPizzaStore', $pizzaStore);

        $this->assertEquals($component->menu->menu_name, $menu->menu_name);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
