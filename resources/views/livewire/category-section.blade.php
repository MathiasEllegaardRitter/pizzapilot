<div class="w-2/3 m-auto mt-16">
    <div class="navbar-container flex justify-between">
        <div class="arrow arrow-left" wire:click="scrollLeft">&lt;</div>
        <div class="nav-wrapper" id="navbar-list">
            <ul class="flex flex-row space-x-40 text-stone-400 m-auto">
                @if ($categories)
                    @foreach ($categories as $category)
                        <li wire:click="update({{ $category->id }})" class="hover:cursor-pointer hover:text-orange-400 {{ $category->id == $mainCategory->id ? 'text-orange-500' : '' }}">
                            {{ $category->name }}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="arrow arrow-right" wire:click="scrollRight">&gt;</div>
    </div>
</div>

