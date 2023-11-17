<div>
    <ul class="flex flex-row w-3/4 ml-20 space-x-40 text-orange-500">
    
        @if ($categories)
    
        @endif
    
        @foreach ($categories as $category)
            <li>{{$category->name}}<li>
        @endforeach
    </ul>
</div>
