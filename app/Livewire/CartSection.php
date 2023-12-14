<?php

namespace App\Livewire;
    
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;

class CartSection extends Component
{
    public $cart;
    public $delivery;

    public $summary;
    protected $debug = true;

    public function mount()
    {
        $this->initializeCart(); 
    }

    public function render()
    {
        $this->cart = session('cart');
        // returns he cart with all the products
        return view('livewire.cart-section')->with('cart', $this->cart)->with('delivery', $this->delivery);
    }

    public function initializeCart()
    {
        $this->cart = session('cart');

        if (empty($cart)) {
            $this->cart = [];
        } else {
            foreach ($cart as $item) {
                $existingProduct = $this->findExistingProduct($item['product_id'], $item['product_name'], $item['product_price']);
                $existingProductIndexInCart = $this->findExistingProductIndexInCart($item['product_id'], $item['product_name'], $item['product_price']);
                if (!$existingProduct) {
                    // If product doesn't exist in the database remove it. LETS USE REMOVE CART AND ADD ID INSTEAD
                    unset($this->cart[$existingProductIndexInCart]);
                    session(['cart' => $this->cart]);
                }
            }
        }
    }

    #[On('closeCart')]
    public function closeCart()
    {
        $result = false;
        $this->dispatch('showCart', $result);
    }

    #[On('addToCart')]
    public function addToCart(Product $product)
    {
        $existingProductIndex = $this->findExistingProductIndexInCart($product->id, $product->name, $product->price);
        
        if($existingProductIndex !== false)
        {
            // Add one item to cart
            $this->cart[$existingProductIndex]['quantity'] += 1;
        } else
        {
            $this->cart[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'quantity' => 1,
            ];
        }
        $this->persistCart();
    }

    public function increaseQuantity($item)
    {
        $itemArray = json_decode($item, true);
        $index = array_search($itemArray['product_id'], array_column($this->cart, 'product_id'));

        if($index !== false)
        {
            $this->cart[$index]['quantity'] += 1;
            $this->persistCart();
        }
    }
    
    public function removeFromCart($item)
    {
        $itemArray = json_decode($item, true);
        $index = array_search($itemArray['product_id'], array_column($this->cart, 'product_id'));

        if($index !== false)
        {
        unset($this->cart[$index]);

        $this->cart = array_values($this->cart);

        $this->persistCart();
        }
    }

    public function decreaseQuantity($item)
    {
        $itemArray = json_decode($item, true);
        $index = array_search($itemArray['product_id'], array_column($this->cart, 'product_id'));

        if($index !== false && $this->cart[$index]['quantity'] > 1)
        {
            $this->cart[$index]['quantity'] -= 1;
            $this->persistCart();
        }
    }

    public function removeAll()
    {
        $this->cart = [];
        $this->persistCart();
    }

    private function findExistingProduct($productId, $productName, $productPrice): Product
    {
        return Product::where('id', $productId)
            ->where('name', $productName)
            ->where('price', $productPrice)
            ->first();
    }

    private function findExistingProductIndexInCart($productId, $productName, $productPrice)
    {
        foreach ($this->cart as $index => $item) {
        if ($item['product_id'] == $productId &&
            $item['product_name'] == $productName &&
            $item['product_price'] == $productPrice) {
            return $index;
        }
    }
        return false;
    }

    public function updatedDelivery($value)
    {
        // This method will be called when the $delivery property is updated

        if ($value) {
            $this->delivery =  true;
        } else {
            $this->delivery = false;
        }
        // Dispatch delivery to frontpage-section
        $this->dispatch('deliveryUpdated', $this->delivery);
    }

    protected function persistCart()
    {
        session(['cart' => $this->cart]);
        $this->dispatch('hasItemsInCart');
    }




}
