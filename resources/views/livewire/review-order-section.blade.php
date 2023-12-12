<div class="flex flex-col h-4/5 items-center">
    <div class="mt-4 mb-4 w-2/6 justify-self-center border-b-2 border-neutral-300">
    <h1 class="text-white text-4xl">My Cart Items</h1>
    <p class="text-red-600 py-5">(Clear cart and continue shopping)</p>
    </div>

    <div class="flex flex-col justify-center items-center h-4/5 w-full">
        <livewire:cart-section :delivery="false" :summary="true"/>
        <div class="flex w-1/4 justify-end">
        <button class="bg-green-400 rounded-md text-white my-5 px-10 py-1">Continue</button>
        </div>
    </div>
</div>
