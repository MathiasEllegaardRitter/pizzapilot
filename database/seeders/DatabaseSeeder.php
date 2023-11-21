<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Breakes;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\menu_product;

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

        Category::create([
            'name' => 'Pizza',
            'description' => 'For pizzas',
        ]);

        Category::create([
            'name' => 'Burger',
            'description' => 'For burgers',
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

    }
}
