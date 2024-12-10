<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <h1>SUCCESSFUL LOGIN, WELCOME USER</h1>
    @if (session('status'))
    <SCRIPT>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
            title: "Successfully Login!",
            text: "Welcome Admin",
            icon: "success"
            });
        });
    </SCRIPT>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="content">
        fedfdf
    </div>

</body>
</html>