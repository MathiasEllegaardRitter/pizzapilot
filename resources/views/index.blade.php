<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PizzaPilot</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen w-screen bg-Color">

    {{-- <div class="left-0 top-0 absolute bg-gradient-to-br from-amber-500 to-neutral-800"></div> --}}
    <div>
    @auth
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @else
    <p>You are not logged in.</p>
    <a href="{{ route('login') }}">Login</a>
    @endauth
    </div>



    <h1 class="text-yellow-500">Test<h1>


</body>
</html>