<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
    <div>
    <form action="{{ route('products.create') }}" method="post">
        @csrf
    
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    
        <label for="price">Price:</label>
        <input type="number" name="price" required>
    
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
    
        <button type="submit">Add Product</button>
    </form>
</div>

    <div> 
        <h1>Find product</h1>
        <form action="{{ route('products.findProduct') }}" method="post">

            @csrf
            <label for="product_id">productId:</label>
            <input type="text" name="product_id" required>
            <button type="submit">Find Product</button>
        </form>
    </div>



</body>
</html>