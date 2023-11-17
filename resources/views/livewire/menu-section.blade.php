<div>
    <ul>
    
    @if ($category)
        
    @endif
    
    @foreach ($categories as $category)
        <li>$category->name<li>
    @endforeach
    </ul>
</div>
