<div class="flex flex-row h-full w-full">
    <div class="flex flex-col w-full">
    
        <livewire:navbar />

        @if ($showProduct == true)
        <livewire:productpage :productId="$productId" /> 
        @else 
            
            <livewire:hero-section />
            
            <livewire:menu-section />
            
            
            @if ($showCart == true)
            <livewire:cart-section :delivery="$delivery"/> 
            @endif
            
            @if ($showCheckout == true)
            <livewire:checkout-section :delivery="$delivery" /> 
            @endif              

    @endif
    
    <livewire:scripts />
    </div>
</div>
