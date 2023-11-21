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
    <div class="flex flex-col h-full w-full">

        <livewire:navbar />

        <livewire:hero-section />

        <livewire:menu-section />
        
        <livewire:cart-section />

    </div>
    <livewire:scripts />
</body>
</html>