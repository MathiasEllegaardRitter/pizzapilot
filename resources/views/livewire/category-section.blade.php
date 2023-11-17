<div>
    <ul class="flex flex-row w-3/4 ml-20 space-x-40 text-stone-400">
    
        @if ($categories)
    
        @endif
    
        @foreach ($categories as $category)
        <li wire:click="update({{ $category->id }})" class="hover:cursor-pointer {{ $category->id == $mainCategory->id ? 'text-orange-500' : '' }}">
            {{ $category->name}}
        </li>
            
        @endforeach

    </ul>
</div>
