<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-500">
    <div class="bg-orange-500 mx-auto w-28 text-center">
        <h1 class="text-center mb-11 text-white">THIS IS HOME</h1>
        
        <a href="{{ route('gotopage1') }}">
            <button class="bg-green-500 text-white rounded-md 
                        hover:bg-blue-800 ">
                Go to Page 1
            </button>
        </a>
    </div>
</body>
</html>