<div class="flex flex-col justify-between absolute top-0 right-0 p-4 bg text-white w-1/4 h-full z-10 rounded-lg p-4 cart-background">

    <img class="absolute top-0 right-0" src="{{ asset('storage/icons/Plus Math.svg') }}" alt="Icon">
    <div>
    <div class="w-full justify-center border-b-2 border-slate-600 p-4 text-lg font-bold">
        <h1> Shopping Cart </h1>

    </div>
    @foreach ($cart as $item)
            <div class="flex flex-row justify-between border-b-2 p-2 border-slate-600 p-4"> 
                <img class="w-8 h-8" src="{{ asset('storage/'. $item['product_image']) }}" alt="Product Image">
                {{ $item['product_name'] }}
                {{ $item['product_price'] }}
                {{ $item['quantity'] }}

                {{-- Other properties --}} 
            </div> 
    @endforeach
    </div>
   

    <button class="bg-orange hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="removeAll()">Clear</button>
</div>
