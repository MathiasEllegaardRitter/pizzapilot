<div class="bg-neutral-800 w-2/5 self-center h-full rounded-lg">
    <ul class="flex flex-row h-full w-full">
        <li class="flex {{ ($isDelivery == true  ?? false) ? 'w-1/4' : 'w-1/3' }}  {{ ($step == 'review' ?? false) ? 'bg-black' : 'bg-neutral-800' }} h-full justify-center items-center text-lg text-white hover:bg-black hover:cursor-pointer border-r-2 border-neutral-600 hover:text-neutral-300" wire:click="active('review')"">Review Order</li>
        @if($isDelivery == true){
            <li class="flex w-1/4 h-full {{ ($step == 'delivery' ?? false) ? 'bg-black' : 'bg-neutral-800' }} justify-center items-center text-lg text-white hover:text-neutral-300 hover:bg-black hover:cursor-pointer border-r-2 border-neutral-600" wire:click="active('delivery')"">Delivery</li>
        }
        @endif
        <li class="flex {{ ($isDelivery == true  ?? false) ? 'w-1/4' : 'w-1/3' }} h-full {{ ($step == 'payment' ?? false) ? 'bg-black' : 'bg-neutral-800' }} justify-center items-center text-lg text-white hover:text-neutral-300 hover:bg-black hover:cursor-pointer border-r-2 border-neutral-600" wire:click="active('payment')"">Payment</li>
        <li class="flex {{ ($isDelivery == true  ?? false) ? 'w-1/4' : 'w-1/3' }} h-full {{ ($step == 'confirmation' ?? false) ? 'bg-black' : 'bg-neutral-800' }} justify-center items-center text-lg text-white hover:text-neutral-300 hover:bg-black hover:cursor-pointer" wire:click="active('confirmation')"">Confirmation</li>
    </ul>
</div>
