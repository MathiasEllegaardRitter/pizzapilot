@if($product)
<div>
    <form action="{{ route('products.update') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
    
        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ $product->price }}" required>
    
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>
    
        <button type="submit">Update product</button>
    </form>
<div>

<div>
    <h1>Delete product</h1>
    <form action="{{ route('products.delete') }}" method="post">
        @csrf 
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit">Delete product</button>
    </form>
</div>

@else
<h1>No product was found<h1>
@endif