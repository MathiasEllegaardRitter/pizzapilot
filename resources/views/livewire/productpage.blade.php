<article class="2xl:mt-48 md:mt-20 mt-40 w-full mx-auto flex flex-row">
        <section class="w-3/6">
            <h1 class="2xl:text-5xl ml-24 mb-12 py-2 pt-5 text-white text-3xl">{{ $product->name }}</h1>
            <p class="2xl:text-4xl ml-24 w-4/6 mb-10 py-2 pt-5 text-white font-inter font-thin text-4xl"> {{ $product->description }} </p>
    
            <h2 class="ml-24 mb-6 text-white font-inter text-3xl">Ingredients</h2>
            @if($product->ingredients)
                <ul class="2xl:text-1xl ml-24 w-1/2 mb-16 grid grid-cols-3 gap-4 grid place-items-center justify-items-start">
                    @foreach($product->ingredients as $ingredient)
                        <li>
                            <button class="md:w-4/5 2xl:w-40 bg-white text-orange-400 rounded-xl flex items-center justify-center px-10 py-3">
                                {{ $ingredient->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            @endif
            
            <h2 class="ml-24 mb-6 text-white font-inter text-3xl">Size</h2>
            <div class="md:w-4/5 md:ml-28 2xl:ml-24 2xl:w-1/2 flex mb-12">

                <div class="w-1/3 mx-auto my-auto flex items-center justify-center">
                    <button id="pizzaSizeKids" class="pizzaSizeButtons {{ ($pizzaSizeButtons['Kids'] ?? false) ? 'bg-orange-400 text-bold text-white font-bold' : 'bg-white text-orange-400 font-normal' }} w-2/3 px-10 py-3 hover:bg-orange-400 hover:text-white rounded-l-2xl" wire:click="pizzaSizeActive('Kids')" >Kids</button>
                    <button id="pizzaSizeNormal" class="pizzaSizeButtons {{ ($pizzaSizeButtons['Normal'] ?? false) ? 'bg-orange-400 text-bold text-white font-bold' : 'bg-white text-orange-400 font-normal' }} w-2/3 px-10 py-3 hover:bg-orange-400 hover:text-white" wire:click="pizzaSizeActive('Normal')" >Normal</button>
                    <button id="pizzaSizeFamily" class="pizzaSizeButtons {{ ($pizzaSizeButtons['Family'] ?? false) ? 'bg-orange-400 text-bold text-white font-bold' : 'bg-white text-orange-400 font-normal' }} w-2/3 px-10 py-3 hover:bg-orange-400 hover:text-white rounded-r-2xl" wire:click="pizzaSizeActive('Family')" >Family</button>
                </div>
                
                <div class="mx-auto my-auto flex items-center justify-center">
                    <button class="bg-white px-3 py-3 bg-white cursor-pointer hover:text-black font-bold text-orange-400 rounded-l-2xl" wire:click="decrement">-</button>
                    <p class="bg-white px-3 py-3 bg-white font-bold text-orange-400">{{ $count }}</p>
                    <button class="bg-white px-3 py-3 bg-white cursor-pointer hover:text-black font-bold text-orange-400 rounded-r-2xl" wire:click="increment">+</button>
                </div>
            </div>
            
            <div class="py-5 mb-12 mx-auto my-auto flex items-center">
                <button class="ml-24 bg-orange-400 text-white px-10 py-4 hover:text-black font-bold rounded-xl">Add Order</button>
                <p class="ml-24 text-orange-400 font-inter font-thin text-5xl">{{ $product->price * $count }} $</p>
            </div>
        </section>
    
        <section class="w-3/6 flex items-center justify-center">
            <img class="max-w-full" src="{{ asset('storage/' . $product->image) }}" alt="Icon">
        </section>
    </article>
