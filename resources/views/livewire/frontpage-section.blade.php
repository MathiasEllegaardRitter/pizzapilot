<div class="flex flex-row w-full">
    <div class="flex flex-col w-full">
   
        <livewire:navbar />

        @if ($showProduct == true)
        <livewire:productpage :productId="$productId" lazy /> 
        @else 

        @if ($showFavorites == true)
        <livewire:favoritespage lazy/> 
        @else 
            
            <livewire:hero-section lazy />
            
            <livewire:menu-section lazy />
            
            
             @if ($showCart == true)
            <livewire:cart-section :delivery="$delivery" :summary="false" lazy /> 
            @endif
            
            @if ($showCheckout == true)
            <livewire:checkout-section :delivery="$delivery" lazy /> 
            @endif
            


         @endif
       @endif
    </div>
</div>

