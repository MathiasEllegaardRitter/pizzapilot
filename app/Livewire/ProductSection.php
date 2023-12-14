<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Models\User;
use App\Livewire\Auth;

class ProductSection extends Component
{
    public Category $mainCategory;
    public $products;
    
    // check
    public $favoriteStatus = []; 

    public function clickProduct($productId)
    {
        $this->dispatch('clickProduct', $productId);
    }

    #[On('mainCategoryUpdated')]
    public function updateMainCategory($categoryId)
    {
        $category = new Category();
        $this->mainCategory = $category::find($categoryId);
        $this->products = $this->mainCategory->products;
    }

    public function addToCart($productId)
    {
        $product = $this->products->find($productId);
        if($product != null) {
            $this->addProductToSession($product);
            $this->dispatch('showCart',  true);
            $this->dispatch('addToCart', $product);
        } else
        {

        }
    }

    public function addProductToSession($product)
    {
        $cart = session('cart', []);

        $existingProductIndex = $this->findExistingProductIndexInCart($product->id, $product->name, $product->price);

        if ($existingProductIndex !== false) {
            // Add one item to cart
            $cart[$existingProductIndex]['quantity'] += 1;
        } else {
            $cart[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'quantity' => 1,
            ];
        }
        // Persist the updated cart in the session
        session(['cart' => $cart]);
    }

    private function findExistingProductIndexInCart($productId, $productName, $productPrice)
    {
        $cart = session('cart', []);
        foreach ($cart as $index => $item) {
        if ($item['product_id'] == $productId &&
            $item['product_name'] == $productName &&
            $item['product_price'] == $productPrice) {
            return $index;
        }
    }
        return false;
    }

    public function mount($mainCategory)
    {
        $this->mainCategory = $mainCategory;
        // Initialize the favorite status array with product IDs
        $this->favoriteStatus = array_fill_keys($this->mainCategory->products->pluck('id')->toArray(), false);
    }

    public function render()
    {
        $category = $this->mainCategory;

        $products = $category->products;
        $this->products = $products;

        return view('livewire.product-section')->with("products", $this->products);
    }

    public function toggleFavorite($productId)
    {
        $user = auth()->user();     
        $customer = $user->customer;

        if ($customer->favorites->contains($productId)) {
            // Remove from favorites
            $customer->favorites()->detach($productId);
            $message = 'Item removed from favorites.';
        } else {
            // Add to favorites
            $customer->favorites()->attach($productId);
            $message = 'Item added to favorites.';
        }

        // Optionally, you can emit an event or perform other actions here

        // Refresh the Livewire component to reflect changes in the UI
        $this->dispatch('favoritesUpdated');

        // You can also use the following line to redirect back
        // return redirect()->back()->with('message', $message);
    }

}
