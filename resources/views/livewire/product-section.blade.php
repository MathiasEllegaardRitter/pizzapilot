<div class="flex flex-row space-x-20 ml-28 mt-10 text-white">
    {{-- The Master doesn't talk, he acts. --}}
    @foreach ($products as $product)

        <div class="flex flex-col">
        
        <img class="w-24 h-24 hover:cursor-pointer" src="{{ asset('storage/' . $product->image) }}" alt="Icon">

        <h1>{{$product->name}}</h1>

        @if (count($product->ingredients) > 0)
        @foreach ($product->ingredients as $ingredient)
        <h1>{{$ingredient->name}}</h1>
        @endforeach     
        @endif

        <div class="flex flex-row space-x-2 items-center">
        <h2>$ {{$product->price}}</h2>
        <img class="w-5 h-5 hover:cursor-pointer" src="{{ asset('storage/icons/Plus Math.svg') }}" alt="Icon">
        </div>

        </div>

    @endforeach
</div>
