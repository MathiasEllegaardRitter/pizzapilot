<div class="absolute inset-0 mx-auto my-auto h-full w-full bg-Color z-10">
    <div class="flex flex-row items-center ">
        <img wire:click="closeCheckout" class="h-5 w-5 red-400 m-4 hover:cursor-pointer" src="{{ asset('storage/icons/cross 1.svg') }}" alt="Icon">
        <div class="bg-esc rounded-md w-12 text-center text-sm text-white border-esc border-2">
        <h1> esc </h1>
        </div>
    </div>

    <div class="flex flex-row justify-center content-center w-full h-14"> 
        {{-- <livewire:steps-ahead-section :delivery=$delivery /> --}}
        <livewire:steps-ahead-section :delivery=true />
    </div>

    <div class="{{ ($step == 'review') ? '' : 'hidden' }} h-5/6 w-full mt-8"> 
        <livewire:review-order-section  />
    </div>

    <div class="{{ ($step == 'delivery') ? '' : 'hidden' }} h-5/6 w-full mt-8"> 
        <livewire:delivery-order-section  />
    </div>
    
</div>
    