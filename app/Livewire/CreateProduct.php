<?php

// app/Http/Livewire/ProductComponent.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductComponent extends Component
{
    public $name;
    public $description;
    public $price;
    public $category_id;

    public function createProduct()
    {
        // Validate input if needed

        // Save the product to the database
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        // Optionally, you can emit an event or perform other actions

        // Reset input values
        $this->reset(['name', 'description', 'price', 'category_id']);
    }

    // Other Livewire component methods, properties, etc.
}
