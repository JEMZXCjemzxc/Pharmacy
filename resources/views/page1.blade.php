<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1  class="text-red-500">This is Page 1</h1>
<a href="{{ route('gotohome') }}">
        <button class="bg-green-500 text-white rounded-md hover:bg-blue-800">Go to HOME</button>
    </a>
</body>
</html>