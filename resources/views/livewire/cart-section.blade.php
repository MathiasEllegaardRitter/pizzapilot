@php $totalPrice = 0; @endphp

<div class="flex flex-col {{ ($summary ?? false) ? '' : 'absolute top-0 right-0' }}  p-4 bg text-white w-1/4 h-full z-10 rounded-lg p-4 cart-background">
    @if ($summary == false)
    <img wire:click="closeCart" class=" {{ ($summary ?? false) ? 'hidden' : '' }}    absolute top-0 right-0 h-5 w-5 red-400 m-4 hover:cursor-pointer" src="{{ asset('storage/icons/cross 1.svg') }}" alt="Icon">
    <div class="w-full justify-center border-b-2 border-slate-600 p-4 text-lg font-bold">
        <h1> Shopping Cart </h1>

    </div>
    @else
    @endif 

    @if(is_array($cart) && count($cart) > 0)
    @if ($summary == false)
    <div class=" flex flex-row w-full items-center place-content-center border-b-2 p-2 border-slate-600 p-4">
        <input type="checkbox" class="border-solid border-neutral-300" wire:model.live="delivery">
        <label class="ml-2"> Delivery? </label>
        <label> Test {{ $delivery ? 'True' : 'False' }} </label>
    </div>
    @endif
    
<div class="flex flex-col max-h-2/3 overflow-y-auto"> 
    @foreach ($cart as $item)
    @php
    $totalCostForItem = $item['product_price'] * $item['quantity'];
    $totalPrice += $totalCostForItem;
    @endphp
            <div class="flex flex-row justify-between border-b-2 p-4 border-slate-600">
                <div class="flex flex-col items-center space-y-2 w-1/3 h-1/5"> 
                    <div class="flex items-center w-full">
                        <img class="w-12 h-12 rounded-lg flex-shrink-0" src="{{ asset('storage/'. $item['product_image']) }}" alt="Product Image">
                    </div>
                    <div class="flex items-center w-full">
                        <p class="truncate">{{ $item['product_name'] }}</p>
                    </div>
                </div>
                
                <div class="flex flex-row space-x-4 items-center">
                    <div class="flex flex-row items-center">
                        <button class="bg-white 2xl:px-3 2xl:py-1 px-1.5 bg-white cursor-pointer hover:text-orange-400 font-bold text-black rounded mr-2" wire:click="decreaseQuantity('{{ json_encode($item) }}')">-</button>
                        {{ $item['quantity'] }}
                        <button class="bg-white 2xl:px-3 2xl:py-1 px-1.5 bg-white cursor-pointer hover:text-orange-400 font-bold text-black rounded ml-2" wire:click="increaseQuantity('{{ json_encode($item) }}')">+</button>
                    </div>
                    <div class="flex flex-col items-center p-4">
                        ${{ $item['product_price'] * $item['quantity'] }}
                        <label class="text-red-700 hover:cursor-pointer" wire:click="removeFromCart('{{ json_encode($item) }}')"> Remove</label>
                    </div>
                </div>
                {{-- Other propertiesf --}} 
            </div>
    @endforeach
</div>

@if ($totalPrice !== 0)
<div class="flex flex-row justify-between py-8">
    <div class="text-slate-200">Total</div>  
    <div> <h1 class="text-white">${{$totalPrice}} <h1></div> 
</div>
@endif
    @if ($summary == false)
    <div class="flex flex-rowitems-center justify-evenly justify-self-end py-5">
        <livewire:order-create :items="$cart" :delivery="$delivery"/> 
        <button class="bg-red-700 hover:text-black text-white text-lg 2xl:py-3 py-1.5 2xl:px-8 px-4 rounded-lg self-center" wire:click="removeAll()">Clear</button>
    </div>
    @endif

    @else
        <div class="flex flex-col text-lg w-full h-full place-content-center">
            <img class="w-8 h-8 self-center" src="{{ asset('storage/icons/Shopping Cart.svg') }}">
            <label class="text-white self-center mt-2"> Shopping cart is empty </label> 
        </div>
    @endif
</div>

