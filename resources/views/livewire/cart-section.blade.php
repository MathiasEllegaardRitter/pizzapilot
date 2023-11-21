<div>
    <h1> Cart-Test </h1>
    @foreach ($cart as $product)
        <div> 
            <h4>{{ $product->name }}</h4>
            <p>Price: ${{ $product->price }}</p>    
        </div> 
    @endforeach

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="removeAll()">Remove all </button>
</div>
