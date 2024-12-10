<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
<ul>
    <!-- Name Routes in Laravel -->
        <a href="{{ route('index') }}" class="text-red-500"><li>Home</li></a>
        <a href="{{ route('gallery') }}"><li>Gallery</li></a>
        <a href="{{ route('servicesAko') }}"><li>Services</li></a>
        <a href="{{ route('about') }}"><li>About</li></a>
    </ul>
    <br>
    <h1 class="font-bold text-center">THIS IS HOME PAGE!</h1>

</body>
</html>