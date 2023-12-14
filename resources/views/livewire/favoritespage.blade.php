<div class="flex flex-row w-full">
    <div class="flex flex-col w-full">
        <h1 class="text-3xl text-3xl text-center text-white my-16">Favorites</h1>
        @if(count($favorites) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 m-auto text-white gap-6 w-max">
                @foreach($favorites as $product)
                    <div class="flex flex-col section-card-width p-4">
                        @if(auth()->check() && auth()->user()->favorites->contains($product->id))
                        {{-- Display the filled heart icon if the product is favorited --}}
                            <img class="w-5 h-5 hover:cursor-pointer" wire:click="toggleFavorite({{ $product->id }})" src="{{ asset('storage/icons/Heart.svg') }}" alt="Heart full Icon">
                        @else
                            @if(auth()->check() )
                            {{-- Display the empty heart icon if the product is not favorited --}}
                            <img class="w-5 h-5 heart-icon hover:cursor-pointer" wire:click="toggleFavorite({{ $product->id }})" src="{{ asset('storage/icons/hearts.png') }}" alt="Heart empty Icon">
                            @endif
                        @endif
                        <img wire:click="clickProduct({{ $product->id }})" class="w-24 h-24 hover:cursor-pointer m-auto" src="{{ asset('storage/' . $product->image) }}" alt="Icon">
            
                        <h1 class="text-lg font-bold mt-2">{{$product->name}}</h1>
            
                        <div class="flex flex-row space-x-2 text-stone-500 overflow-hidden max-w-xs flex-wrap">
                            @if (count($product->ingredients) > 0)
                                @foreach ($product->ingredients as $ingredient)
                                    <h1 class="overflow-ellipsis">{{$ingredient->name}}</h1>
                                @endforeach
                            @endif
                        </div>
            
                        <div class="flex flex-row justify-between items-center mt-2">
                            <h2 class="text-xl font-semibold">$ {{$product->price}}</h2>
                            <img class="w-5 h-5 hover:cursor-pointer" wire:click="addToCart({{ $product->id }})" src="{{ asset('storage/icons/Plus Math.svg') }}" alt="Icon">
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <p class="text-3xl text-3xl text-center text-white">No favorites yet.</p>
            @endif
    </div>
    @if ($showCart == true)
    <livewire:cart-section :delivery="false" :summary="false"/> 
    @endif
</div>