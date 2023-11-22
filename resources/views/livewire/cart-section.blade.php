<div>
    <h1> Cart-Test </h1>
    @foreach ($cart as $item)
        <div> 
            {{ $item['product_name'] }}
            {{ $item['product_price'] }}
            {{ $item['quantity'] }}
            {{-- Other properties --}} 
        </div> 
    @endforeach

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="removeAll()">Remove all </button>
</div>
