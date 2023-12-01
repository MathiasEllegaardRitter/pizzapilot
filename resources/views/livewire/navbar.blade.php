<nav class="flex flex-row w-full h-20 items-center justify-between">
    <img wire:click="home" class="ml-10 hover:cursor-pointer" src="{{ asset('storage/icons/PIZZAPILOT.svg') }}" alt="Icon">
    
    <div class="text-black w-1/4 rounded-x1">
        <input class="w-full" placeholder="What would you like"/>
    </div>

    <div class="flex flex-row text-orange-400 justify-between space-x-5 mr-10">

    <div wire:click="cart" class="hover:cursor-pointer flex flex-col items-center">
        @if($hasItemsInCart)
        <img class="w-4 h-4 z-0 absolute self-end -mt-2" src="{{ asset('storage/icons/basket.png') }}" alt="Icon">
        @endif
        
        <img class="w-8 h-8 z-1" src="{{ asset('storage/icons/Shopping Cart.svg') }}" alt="Icon">
        <div>
        Cart
        </div>
    </div>

    <div wire:click="favorites" class="hover:cursor-pointer flex flex-col items-center">
        <img class="w-8 h-8" src="{{ asset('storage/icons/Heart.svg') }}" alt="Icon">
        <div>
        Favorites
        </div>
    </div>

    <div wire:click="message" class="hover:cursor-pointer flex flex-col items-center">
        <img class="w-8 h-8" src="{{ asset('storage/icons/Envelope.svg') }}" alt="Icon">
        <div>
            Message
        </div>
    </div>

    <div wire:click="user" class="hover:cursor-pointer flex flex-col items-center">
        <img class="w-8 h-8" src="{{ asset('storage/icons/User.svg') }}" alt="Icon">
        
        <div>
        User
        </div>

    </div>
            @auth
            <div>
            {{-- <p> {{ Auth::user()->name }}!</p> --}}
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            
            
            <div class="hover:cursor-pointer flex flex-col items-center">
            <img class="w-8 h-8" src="{{ asset('storage/icons/Logout.svg') }}" alt="Icon">
            <button type="submit">Logout</button>
            </div>

            </form>
            </div>
            
            @else

            <div class="hover:cursor-pointer flex flex-col items-center">
            <img class="w-8 h-8" src="{{ asset('storage/icons/Enter.svg') }}" alt="Icon">
            <div>
            <a href="{{ route('login') }}">Login</a>
            </div>
            @endauth
            </div>
</nav>
