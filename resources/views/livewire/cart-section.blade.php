<div>
    <h1> Cart-Test </h1>
    @foreach ($cart as $product)
        <div> 
            <h4>{{ $product->name }}</h4>
            <p>Price: ${{ $product->price }}</p>    
        </div> 
    @endforeach
</div>
