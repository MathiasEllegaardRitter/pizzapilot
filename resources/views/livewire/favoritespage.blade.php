<div>
    <h1 class="text-3xl text-3xl text-center text-white my-16">Favorites</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 m-auto text-white gap-6 w-max">
        @foreach ($products as $product)
            <livewire:product-card :product="$product" wire:key="{{ $product->id }}"/>
        @endforeach
    </div>
</div>
