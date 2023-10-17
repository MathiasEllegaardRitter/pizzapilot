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
</body>
</html>