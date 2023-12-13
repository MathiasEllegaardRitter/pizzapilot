<div class="flex flex-row w-full">
    <div class="flex flex-col w-full">
   
        <livewire:navbar />

        @if ($showProduct == true)
        <livewire:productpage :productId="$productId" /> 
        @else 

        @if ($showFavorites == true)
        <livewire:favoritespage /> 
        @else 
            
            <livewire:hero-section />
            
            <livewire:menu-section />
            
            
             @if ($showCart == true)
            <livewire:cart-section :delivery="$delivery" :summary="false"/> 
            @endif
            
            @if ($showCheckout == true)
            <livewire:checkout-section :delivery="$delivery" /> 
            @endif
            
        

         @endif
       @endif
    </div>
</div>

