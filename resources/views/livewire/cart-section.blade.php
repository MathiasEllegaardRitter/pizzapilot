@php $totalPrice = 0; @endphp



<div class="flex flex-col justify-between absolute top-0 right-0 p-4 bg text-white w-1/4 h-full z-10 rounded-lg p-4 cart-background">

    <img wire:click="closeCart" class="absolute top-0 right-0 h-5 w-5 red-400 m-4 hover:cursor-pointer" src="{{ asset('storage/icons/cross 1.svg') }}" alt="Icon">
    <div>
    <div class="w-full justify-center border-b-2 border-slate-600 p-4 text-lg font-bold">
        <h1> Shopping Cart </h1>

    </div>
    @if(count($cart) > 0)
    <div class=" flex flex-row w-full items-center place-content-center border-b-2 p-2 border-slate-600 p-4">
        <input type="checkbox" class="border-solid border-neutral-300" wire:model.live="delivery">
        <label class="ml-2"> Delivery? </label>
        {{-- <label> Test {{ $delivery ? 'True' : 'False' }} </label> --}}
    </div>

    @foreach ($cart as $item)
    @php
    $totalCostForItem = $item['product_price'] * $item['quantity'];
    $totalPrice += $totalCostForItem;
    @endphp
            <div class="flex flex-row justify-between border-b-2 p-2 border-slate-600 p-4">
                <div class="flex flex-row items-center space-x-2"> 
                    <div>
                    <img class="w-12 h-12 rounded-lg" src="{{ asset('storage/'. $item['product_image']) }}" alt="Product Image">
                    </div>
                    <div>
                    {{ $item['product_name'] }}
                     </div>
                </div>
            

                <div class="flex flex-row space-x-4 items-center">
                <div>
                    {{ $item['quantity'] }}
                </div>
                <div class="flex flex-col items-center p-4">
                ${{ $item['product_price'] * $item['quantity'] }}
                <label class="text-red-600 hover:cursor-pointer" wire:click="removeFromCart('{{ json_encode($item) }}')"> Remove</label>
                </div>

                </div>

                {{-- Other properties --}} 
            </div>
    @endforeach
    @if ($totalPrice !== 0)
    <div class="flex flex-row justify-between mt-2">
        <div class="text-slate-200">Total</div>  
        <div> <h1 class="text-white">${{$totalPrice}} <h1></div> 
    </div>
    @endif
    </div>

    <div class="flex flex-row items-center justify-center space-x-2">
        <livewire:order-create :items="$cart" /> 
    
    <button class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded self-center" wire:click="removeAll()">Clear</button>
    </div>

    @else
    <div class="flex flex-col text-lg w-full h-full place-content-center">
        <img class="w-8 h-8 self-center" src="{{ asset('storage/icons/Shopping Cart.svg') }}">
        <label class="text-white self-center mt-2"> Shopping cart is empty </label> 
    </div>
    @endif

   
</div>

