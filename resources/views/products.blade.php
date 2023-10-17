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

    <form action="{{ route('products.create') }}" method="post">

 

        @csrf
    
     
    
     
    
     
    
        <label for="name">Name:</label>
    
     
    
        <input type="text" name="name" required>
    
     
    
     
    
     
    
        <label for="price">Price:</label>
    
     
    
        <input type="number" name="price" required>
    
     
    
     
    
        <label for="description">Description:</label>
        <textarea type="text" name="description" required></textarea>
    
       
    
        <button type="submit">Add Product</button>
    
     
    
    </form>



</body>
</html>