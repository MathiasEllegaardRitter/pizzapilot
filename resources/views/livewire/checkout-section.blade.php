<div class="absolute inset-0 mx-auto my-auto h-full w-full bg-Checkout">
    <div class="flex flex-row items-center border-b-2 border-slate-600">
        <img wire:click="closeCheckout" class="h-5 w-5 red-400 m-4 hover:cursor-pointer" src="{{ asset('storage/icons/cross 1.svg') }}" alt="Icon">
        <div class="bg-esc rounded-md w-12 text-center text-sm text-white border-esc border-2">
        <h1> esc </h1>
        </div>
    </div>

    <div class="self-center"> 
        @if ($delivery == true)
            <h1> Delivery is ready to be delivered</h1>
        @else
            <h1>false</h1>
        @endif
    </div>


</div>
    