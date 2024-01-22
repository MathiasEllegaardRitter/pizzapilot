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
use App\Models\favorites;
use App\Models\PizzaStore;
use Illuminate\Support\Str;
use App\Models\DeliveryChecker;
use App\Models\Zipcode;

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
        User::Create([
            'name' => 'Admin',
            'email' => 'Admin@ucn.com',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10)
        ]);

        User::factory(2)->create();

        PizzaStore::create([
            'location' => 'Aalborg',
            'user_id' => 1,
        ]);

        PizzaStore::create([
            'location' => 'Aarhus',
            'user_id' => 2,
        ]);


        // DeliveryChecker What Addesses can be  delivered to

        Zipcode::create(
            [
                'zipcode' => 9800,
                'city' => "Hjørring"
            ]
        ); 

        DeliveryChecker::create(
            [
                'zipcode_id' => 1,
                'pizza_store_id' => 1
            ]
        ); 
        
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
        Category::create([
            'name' => 'Durum',
            'description' => 'For durums',
        ]);

        Category::create([
            'name' => 'UFO',
            'description' => 'For UFOs',
        ]);


        Category::create([
            'name' => 'Pita',
            'description' => 'For Pitas',
        ]);

        Category::create([
            'name' => 'Drinks',
            'description' => 'For drinks',
        ]);

        Category::create([
            'name' => 'Sides',
            'description' => 'For sides',
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
        
        Product::create([
            'name' => 'Meat Durum',
            'description' => 'A very good cheese Durum',
            'instructions' => 'A very good meat Durum',
            'price' => 69,
            'category_id' => 3,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Product::create([
            'name' => 'Meat UFO',
            'description' => 'A very good cheese UFO',
            'instructions' => 'A very good meat UFO',
            'price' => 20,
            'category_id' => 4,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Product::create([
            'name' => 'Meat Pita',
            'description' => 'A very good cheese pita',
            'instructions' => 'A very good meat pita',
            'price' => 0.99,
            'category_id' => 5,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Product::create([
            'name' => 'Tea',
            'description' => 'A very good cheese tea',
            'instructions' => 'A very good meat tea',
            'price' => 0.99,
            'category_id' => 6,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Product::create([
            'name' => 'Fries',
            'description' => 'A very good fries',
            'instructions' => 'A very good meat fries',
            'price' => 2.99,
            'category_id' => 7,
            'image' => 'vrzsYN4VEcWcVgpOSLqXJq8vFxEI44-metaYnVyZ2VyLndlYnA=-.webp',
        ]);

        Product::create([
            'name' => 'Cheese vegan pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 19.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Meat lover Pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 10.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Super cheese vegan pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 19.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Super Meat lover Pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 10.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Mega super cheese vegan pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 19.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Product::create([
            'name' => 'Mega super Meat lover Pizza',
            'description' => 'Description for Product 1',
            'instructions' => 'Instructions for Product 1',
            'price' => 10.99,
            'category_id' => 1,
            'image' => '4Cg4nDpq3sT4CXQZrDzull9IpLvbhd-metacGl6emFfUE5HNDM5OTEucG5n-.png',
        ]);

        Menu::create([
            'menu_name' => 'Main Menu',
            'is_active' => 1,
            'pizza_stores_id' => 1,
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

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 4,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 5,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 6,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 7,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 8,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 9,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 10,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 11,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 12,
        ]);

        Ingredient_product::create([
            'ingredient_id' => 5,
            'quantity' => 0.5,
            'product_id' => 13,
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

        menu_product::create([
            'menu_id' => 1,
            'product_id' => 4,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 5,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 6,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 7,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 8,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 9,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 10,
        ]);

        menu_product::create([
            'menu_id' => 1,
            'product_id' => 11,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 12,
        ]);
        menu_product::create([
            'menu_id' => 1,
            'product_id' => 13,
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

        favorites::create([
            'customer_id' => 1,
            'product_id' => 4,
        ]);


    



    }
}
