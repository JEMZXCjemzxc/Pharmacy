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
    <div class="roundness mr-5 mt-16 relative w-full max-w-sm p-6 space-y-6 bg-white rounded-[25px] shadow-lg lg:ml-[800px] sm:ml-0 ml-4"
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
                Create an Account
            </p>
            <!-- sigup Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Username -->
                <div class="mb-4">
                    {{-- <label for="name" class="block text-sm font-medium text-gray-700">Username</label> --}}
                    <input type="text" id="name" name="name" placeholder="Enter a username"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>
                <!-- Email -->
                <div class="mb-4">
                    {{-- <label for="email" class="block text-sm font-medium text-gray-700">Email</label> --}}
                    <input type="email" id="email" name="email" placeholder="Enter your email address"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>
                <!-- Password -->
                <div class="mb-4">
                    {{-- <label for="password" class="block text-sm font-medium text-gray-700">Password</label> --}}
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>
                <!-- Confirm Password -->
                <div class="mb-4">
                    {{-- <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> --}}
                    {{-- Confirm
                        Password</label> --}}
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>
                <!-- User Role -->
                <div class="mb-4">
                    {{-- <label for="role" class="block text-sm font-medium text-gray-700">User Role</label> --}}
                    <select id="role" name="role"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>

                        @if (!App\Models\User::where('role', 'admin')->exists())
                            <option value="admin">Admin</option>
                        @endif

                        <option value="staff">Staff</option>
                        <option value="pharmacist">Pharmacist</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-center">
                    <input type="submit"
                        class="w-full mt-4 px-4 py-2 bg-[#017165] text-white font-semibold rounded-md hover:bg-[#154c46] focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </input>
                </div>
            </form>
            <p class="text-s">already have an account? </p>
            <a href="{{ route('login-form') }}">
                <p class="text-blue-500 font-bold">Login</p>
            </a>

        </div>
    </div>

</body>

</html>

<!--sibog to right, add shadow-->






{{-- 
<div class="max-w-lg mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-center mb-6">User Registration</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- Username -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="name" name="name" placeholder="Enter a username"
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address"
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>
        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password"
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>
        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm your password"
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>
        <!-- User Role -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">User Role</label>
            <select id="role" name="role"
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>

                @if (!App\Models\User::where('role', 'admin')->exists())
                    <option value="admin">Admin</option>
                @endif
            
                <option value="staff">Staff</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="customer">Customer</option>
            </select>
        </div>
        <!-- Submit Button -->
        <div class="flex justify-center">
            <input type="submit"
                class="w-full mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </input>
        </div>
    </form>

    <!-- Login Link -->
    <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="{{ route('login-form') }}"
            class="text-blue-500 hover:text-blue-600">Login here</a></p>
</div> --}}
