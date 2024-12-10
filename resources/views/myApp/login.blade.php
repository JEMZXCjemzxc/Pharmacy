<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1STMED</title>
    <link rel="icon" href={{ asset('images/pharma.png') }} type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .roundness {
            border-radius: 50px;
        }
        body {
            /* Add the path to your image */
            background-size: cover;
            /* Ensure the background image covers the entire viewport */
            background-position: center;
            background-attachment: fixed;
            /* Make sure the background stays fixed while scrolling */
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-[url('{{ asset('images/bg.jpg') }}')]">

    <!-- Form Container -->
    <!--
    - `lg:ml-[800px]` =  ang form is naa sa rights sa large screens (starting at `lg` breakpoint).
    - `sm:ml-0`=  On small screens, kwaon ang left margin to center the form.
    - `ml-4`= butang ug gamay nga margin sa gagmay nga screen (mobile).
    -->
    <div class="roundness mr-5 relative w-full max-w-sm p-6 space-y-6 bg-white rounded-[25px] shadow-lg lg:ml-[800px] sm:ml-0 ml-4"
        style="box-shadow:0 6px 6px rgba(89, 88, 88, 0.8)">
        <!-- Whole form container -->
        <!-- Logo (Partially Outside the Form) -->
        <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 rounded-full"
            style="box-shadow:0 6px 15px rgba(2, 121, 93, 0.8)">
            <div class="w-32 h-32 rounded-full flex items-center justify-center shadow-md"
                style="background-color: #017165;">
                <img src="{{ asset('images/pharma.png') }}" alt="Logo" class="w-28 h-28 rounded-full">
            </div>
        </div>

        <!-- Form Content -->
        <div class="pt-5 pb-4 max-w-sm">
            <!-- Title -->
            <p class="text-sm text-center text-gray-600 mb-5">
                Please sign in to your account
            </p>
            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Field -->
                <div>
                    <input type="email" id="email" name="email" required placeholder="username" autofocus
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border focus:ring-[#017165]">
                </div>

                <!-- Password Field -->
                <div>
                    <input type="password" id="password" name="password" required placeholder="password"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border focus:ring-[#017165]">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-2 text-white tracking-wide rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:ring-[#017165] font-bold"
                    style="background-color: #017165;">
                    LOGIN
                </button>
            </form>

            <!-- Underline -->
            <hr class="border-t-2 border-gray-300 my-4 mt-10" />

            <a href="{{ route('register-form') }}">
                <button type="submit"
                    class="w-full py-2 text-white tracking-wide rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:ring-[#017165] font-bold"
                    style="background-color: #017165;">
                    REGISTER
                </button>
            </a>

        </div>
    </div>

</body>

</html>

<!--sibog to right, add shadow-->
