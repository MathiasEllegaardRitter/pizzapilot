<div class="flex flex-row h-full w-full">
    <div class="flex flex-col w-full">
    <livewire:navbar />

    <livewire:hero-section />
    
    <livewire:menu-section />

    @if ($showCart == true)
    <livewire:cart-section/> 
    @endif

    @if ($showCheckout == true)
    <livewire:checkout-section :delivery="$delivery" /> 
    @endif       

    <livewire:scripts />
    </div>
</div>

