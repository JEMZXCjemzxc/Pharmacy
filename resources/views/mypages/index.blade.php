<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <h1>This is Index Page</h1>

    <ul>
        <li>
            <a href="{{ route('home') }}">
                <button>Home</button>
            </a>
        </li>
        <li>
            <a href="{{ route('gallery') }}">
                <button>Gallery</button>
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}">
                <button>Contact</button>
            </a>
        </li>
    </ul>
</body>
</html>