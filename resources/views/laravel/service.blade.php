<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<ul>
        <a href="{{ route('index') }}"><li>Home</li></a>
        <a href="{{ route('gallery') }}"><li>Gallery</li></a>
        <a href="{{ route('servicesAko') }}" class="text-red-500"><li>Services</li></a>
        <a href="{{ route('about') }}"><li>About</li></a>
    </ul>
    <br>
    <h1 class="font-bold text-center">THIS IS SERVICES PAGE!</h1>
</body>
</html>