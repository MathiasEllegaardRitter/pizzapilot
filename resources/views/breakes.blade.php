<!DOCTYPE html>

<html>

<head>

    <title>Breakes List</title>

</head>

<body>

    <h1>Breakes List</h1>

    <ul>

        @foreach($breakes as $break)

            <li>{{ $break->name }}</li>

        @endforeach

    </ul>

</body>

</html>