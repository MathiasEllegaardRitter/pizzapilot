<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Breakes;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Ingredient_product;
use App\Models\Menu;
use App\Models\menu_product;
use App\Models\Order;
use App\Models\item_order;
use App\Models\Item;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Breakes::factory(8)->create();
        // Product::factory(5)->create();
        User::factory()->create();
        
        Customer::create([
            'user_id'=> 1,
            'order_id' => 1,
        ]);
        
        Category::create([
            'name' => 'Pizza',
            'description' => 'For pizzas',
        ]);

        Category::create([
            'name' => 'Burger',
            'description' => 'For burgers',
        ]);

        Ingredient::create([
            'name' => 'Onion',
        ]);

        Ingredient::create([
            'name' => 'Tomato',
        ]);

        Ingredient::create([
            'name' => 'Pepperoni',
        ]);

        Ingredient::create([
            'name' => 'Cheese',
        ]);

        Ingredient::create([
            'name' => 'Beef',
        ]);


        Product::create([
            'name' => 'Cheese pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 19.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Meat Pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 10.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Meat Burger',
            'description' => 'A very good cheese burger',
            'instructions' => 'A very good meat burger',
            'price' => 10,
            'category_id' => 2,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Menu::create([
            'menu_name' => 'Main Menu',
            'is_active' => 1,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 2,
            'quantity' => 10,
            'product_id' => 1,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 4,
            'quantity' => 11,
            'product_id' => 1,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 1,
            'quantity' => 0.5,
            'product_id' => 1,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 2,
            'quantity' => 10,
            'product_id' => 2,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 4,
            'quantity' => 11,
            'product_id' => 2,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 3,
            'quantity' => 0.5,
            'product_id' => 2,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 1,
            'quantity' => 0.5,
            'product_id' => 2,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 1,
            'quantity' => 10,
            'product_id' => 3,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 2,
            'quantity' => 11,
            'product_id' => 3,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 4,
            'quantity' => 0.5,
            'product_id' => 3,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 3,
        ]);

        menu_product::create([
            'menu_id' => 1,
            'product_id' => 1,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 2,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 3,
        ]);
        
        item::create([
            'amount' => 1,
            'product_id' => 1,
        ]);
        item::create([
            'amount' => 1,
            'product_id' => 2,
        ]);
        item::create([
            'amount' => 1,
            'product_id' => 3,
        ]);
        Order::create([
            'customer_id' => 1,
            'status' => 'pending',
            'total_price' => 39.98,
        ]);
        Order::create([
            'customer_id' => 1,
            'status' => 'pending',
            'total_price' => 39.98,
        ]);

        item_order::create([
            'quantity' => 1,
            'order_id' => 2,
            'item_id' => 1,
        ]);
    
        item_order::create([
            'quantity' => 2,
            'order_id' => 1,
            'item_id' => 2,
        ]);
    
        item_order::create([
            'quantity' => 1,
            'order_id' => 1,
            'item_id' => 3,
        ]);


    



    }
}
