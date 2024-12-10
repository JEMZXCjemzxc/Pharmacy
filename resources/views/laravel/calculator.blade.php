<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1 class="font-bold text-center mx-auto uppercase mb-10">Arithmetic Calculator Diay Ni</h1>
    <div class="mx-auto mt-5 text-center">
        <form action="">
            <label for="num1" class=""
            >
                Enter Number 1: 
            </label>
            <input type="number" min="0" name="number1" id="num1" class="mb-2">
            <br>
            <label for="num1">Enter Number 2: </label>
            <input type="number" min="0" name="number1" id="num1">
            <br>
            <button class="flex justify-center
                           bg-blue-500 text-white 
                           px-2 py-2 hover:bg-blue-800
                           mx-auto mt-5">Calculate</button>
        </form>
    </div>
</body>
</html>