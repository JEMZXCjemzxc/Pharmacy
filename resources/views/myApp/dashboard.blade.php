<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>1st Med Pharmacy</title>
    <link rel="icon" href={{ asset('images/pharma.png') }} type="image/x-icon" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white mx-auto">
    <div class="min-h-screen ">
        @if (Auth::user()->hasRole('admin'))

            @if (session('success'))
                <x-sweetalert type="success" :message="session('success')" />
            @endif

            @if (session('info'))
                <x-sweetalert type="info" :message="session('info')" />
            @endif

            @if (session('error'))
                <x-sweetalert type="error" :message="session('error')" />
            @endif


            <!-- -------------------------------------------------Sidebar------------------------------------------------------------------- -->
            <aside class="fixed left-0 top-0 h-screen w-64  border-r border-gray-200 z-10 rounded-tr-[50px]">
                <div
                    class="flex items-center justify-center h-16 border-b border-gray-200 bg-[#017165] rounded-tr-[50px]">
                    <h1 class="text-xl font-bold text-white">1st Med Pharmacy</h1>
                </div>

                <nav class="p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] bg-yellow-300 rounded-lg">
                                <i class="fa-solid fa-house-medical"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.medicineDashboard') }}"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-pills"></i>
                                <span>Medicine</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.categoryDashboard') }}"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-list"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.supplierDashboard') }}"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-truck-field"></i>
                                <span>Supplier</span>
                            </a>
                        </li>

                        <li>
                            <a href=""
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-person"></i>
                                <span>Customer</span>
                            </a>
                        </li>



                        <!-- LOGOUT BUTTON-->
                        <div>
                            <li class="mt-[250px] list-none">

                                <!-- Use a button outside the form to prevent immediate form submission -->
                                <button onclick="confirmLogout()"
                                    class="flex focus:outline-none text-gray-500 hover:bg-green-800 focus:ring-1 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:hover:bg-yellow-200">

                                    <svg class="w-5 h-5 text-gray-800 dark:text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </svg>

                                    {{ __('Log Out') }}
                                </button>

                                <!-- Hidden form that will be submitted only if confirmed -->
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>

                            </li>
                        </div>
                        <!-- LOGOUT BUTTON-->
                    </ul>
                </nav>
            </aside>
            <!-- Main Content -->
            <main class="pl-64">

                <!--------------------------------------------------------------------------------------top bar-------------------------------------------------------->
                <div class="pt-[20px]">
                    <div
                        class="relative grid grid-cols-1 sm:flex sm:justify-between md:grid-cols-2 lg:grid-cols-4 gap-10 mb-2">
                        <!-- First Grid: Inventory and Date (Left side) -->
                        <div class="flex items-center mb-2 ml-5">
                            <div class="flex items-center">
                                <h1 class="text-3xl font-semibold text-gray-800">
                                    Dashboard
                                </h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 ml-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                                    <path fill-rule="evenodd"
                                        d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <!-- Fourth Grid: Admin (Top-right) -->
                        <div class="absolute top-0 right-0 pr-10 pt-5 font-bold text-xl text-green-500 flex">
                            <div class="w-6 h-6 rounded-full overflow-hidden bg-gray-100 shadow-md mt-1 mr-2">
                                <img src="{{ asset('images/admin.png') }}" alt="Admin Logo">
                            </div>
                            Admin: <span>{{ Auth::user()->name }}</span>
                        </div>

                        <!-- Third Grid: Date (Left side) -->
                        <div class="ml-5 mr-5">
                            <p>{{ now()->format('D-M-Y H:I:s') }}</p>
                        </div>
                    </div>
                    <!-- Underline -->
                    <hr class="border-t-5 border-gray-300 my-4 mt-[20px]" />
                </div>
                <!-------------------------------------------------------------------------------------top bar-------------------------------------------------------->

                <!------------------------------------------- Dashboard Content ---------------------------------->

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                    @php
                        $categoriesCount = \App\Models\Category::count();
                        $medicineCount = \App\Models\Medicine::count();
                        $suppliersCount = \App\Models\Supplier::count();
                    @endphp
                    <!-- Inventory Overview -->
                    <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Inventory Levels</h3>
                            <div class="flex items-center space-x-2">
                            </div>
                        </div>

                        <!-- Inventory Bar Graph -->
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-1/4 text-gray-700 font-semibold">Paracetamol</div>
                                <div class="w-2/4 bg-gray-200 rounded-full h-4 overflow-hidden">
                                    <div class="bg-blue-500 h-full" style="width: 75%"></div>
                                </div>
                                <span class="w-1/4 text-right text-gray-600 pl-4">750/1000</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-1/4 text-gray-700 font-semibold">Ibuprofen</div>
                                <div class="w-2/4 bg-gray-200 rounded-full h-4 overflow-hidden">
                                    <div class="bg-green-500 h-full" style="width: 60%"></div>
                                </div>
                                <span class="w-1/4 text-right text-gray-600 pl-4">600/1000</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-1/4 text-gray-700 font-semibold">Amoxicillin</div>
                                <div class="w-2/4 bg-gray-200 rounded-full h-4 overflow-hidden">
                                    <div class="bg-red-500 h-full" style="width: 40%"></div>
                                </div>
                                <span class="w-1/4 text-right text-gray-600 pl-4">400/1000</span>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        {{-- <div class="mt-6 grid grid-cols-3 gap-4"> --}}
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            {{-- categoriesCount --}}
                            <div class="bg-blue-50 p-4 rounded-lg text-center">
                                <i class="fa-solid fa-list text-blue-500 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-600">No. of Categories</p>
                                <p class="text-xl font-bold text-blue-600">{{ $categoriesCount }}</p>
                                @if ($categoriesCount == 0)
                                    <p class="mt-2 text-sm text-red-500">
                                        "No categories yet—time to get things organized!"</p>
                                @elseif ($categoriesCount < 3)
                                    <p class="mt-2 text-sm text-gray-500">
                                        "Just a few categories here—might be a good time to add more."</p>
                                @else
                                    <p class="mt-2 text-sm text-gray-600">
                                        "Looking good! You’ve got plenty of categories to work with."</p>
                                @endif
                            </div>

                            {{-- medicinesCount --}}
                            <div class="bg-green-50 p-4 rounded-lg text-center">
                                <i class="fas fa-pills text-green-500 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-600">Total Medicines</p>
                                <p class="text-xl font-bold text-green-600">{{ $medicineCount }}</p>

                                @if ($medicineCount == 0)
                                    <p class="mt-2 text-sm text-red-700">Warning: Out of Stock!</p>
                                @elseif ($medicineCount < 3)
                                    <p class="mt-2 text-sm text-gray-500"><span
                                            class="text-red-600 font-bold text-[18px]">Warning:</span> Out of Stocks
                                        soon!</p>
                                @else
                                    <p class="mt-2 text-sm text-green-600">Stocks are healthy!</p>
                                @endif
                            </div>

                            {{-- supplierscount --}}
                            <div class="bg-green-50 p-4 rounded-lg text-center">
                                <i class="fa-solid fa-truck-field text-yellow-500 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-600">Total Suppliers</p>
                                <p class="text-xl font-bold text-yellow-600">{{ $suppliersCount }}</p>
                                @if ($suppliersCount == 0)
                                    <p class="mt-2 text-sm text-red-700">
                                        "No suppliers added yet—let’s connect with some!"</p>
                                @elseif ($suppliersCount < 3)
                                    <p class="mt-2 text-sm text-gray-500">
                                        "time to expand your network."</p>
                                @else
                                    <p class="mt-2 text-sm text-green-600">
                                        "Great! You’re well-connected with suppliers."</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Recent Activity -->
                <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-700">Paracetamol Restocked</p>
                                <p class="text-sm text-gray-500">Added 500 units</p>
                            </div>
                            <span class="text-sm text-gray-500">2 hours ago</span>
                        </div>
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-700">Low Stock Alert</p>
                                <p class="text-sm text-gray-500">Amoxicillin below threshold</p>
                            </div>
                            <span class="text-sm text-gray-500">4 hours ago</span>
                        </div>
                    </div>
                </div>
            </main>

            <script>
                function confirmLogout() {
                    Swal.fire({
                        title: 'Are you sure you want to logout?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#017165',
                        confirmButtonText: 'Yes, logout',

                        cancelButtonColor: '#E23232',
                        cancelButtonText: 'Cancel'

                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logoutForm').submit(); // Submit the form if confirmed
                        }
                    });
                }
            </script>
<!----------------------------------------------------------------END OF ADMIN ------------------------------------------------------------------------------------------>
        @elseif (Auth::user()->hasRole('staff'))
            <h1 class="text-red-500">Welcome Staff</h1>

            @if (session('success'))
                <x-sweetalert type="success" :message="session('success')" />
            @endif

            @if (session('info'))
                <x-sweetalert type="info" :message="session('info')" />
            @endif

            @if (session('error'))
                <x-sweetalert type="error" :message="session('error')" />
            @endif

            <!-- -------------------------------------------------Sidebar------------------------------------------------------------------- -->
            <aside class="fixed left-0 top-0 h-screen w-64  border-r border-gray-200 z-10 rounded-tr-[50px]">
                <div
                    class="flex items-center justify-center h-16 border-b border-gray-200 bg-[#017165] rounded-tr-[50px]">
                    <h1 class="text-xl font-bold text-white">1st Med Pharmacy</h1>
                </div>
                <nav class="p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] bg-yellow-300 rounded-lg">
                                <i class="fa-solid fa-cash-register"></i>
                                <span>Point of Sale</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-chart-line"></i>
                                <span>Sales</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-pills"></i>
                                <span>Inventory</span>
                            </a>
                        </li>

                        <div>
                            <li class="mt-[380px] list-none">
                                <button onclick="confirmLogout()"
                                    class="flex focus:outline-none text-gray-500 hover:bg-green-800 focus:ring-1 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:hover:bg-yellow-200">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </li>
                        </div>

                        <!-- LOGOUT BUTTON-->
                        <div>
                            <li class="mt-[300%] list-none ml-11">
                                <button onclick="confirmLogout()"
                                    class="flex focus:outline-none text-gray-500 hover:bg-green-800 focus:ring-1 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:hover:bg-yellow-200">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </li>
                        </div>
                        <!-- LOGOUT BUTTON-->
                    </ul>
                </nav>
            </aside>

            <main class="pl-64">
                <!--------------------------------------------------------------------------------------top bar-------------------------------------------------------->
                <div class="pt-[20px]">
                    <div
                        class="relative grid grid-cols-1 sm:flex sm:justify-between md:grid-cols-2 lg:grid-cols-4 gap-10 mb-2">
                        <!-- First Grid: Inventory and Date (Left side) -->
                        <div class="flex flex-col items-start mb-2 ml-5">
                            <div class="flex items-center">
                                <h1 class="text-3xl font-semibold text-green-800">
                                    POINT OF SALES
                                </h1>
                                <i class="fa-solid fa-cash-register px-4 text-3xl text-green-800"></i>
                            </div>
                            <h2 class="text-lg text-green-800 mt-2">{{ date('l, d F Y') }}</h2>
                        </div>
                        <!-- Fourth Grid: Admin (Top-right) -->
                        <div class="absolute top-0 right-0 pr-10 pt-5 font-bold text-xl text-green-500">
                            Staff: <span>{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <!-- Underline -->
                    <hr class="border-t-5 border-gray-300 my-4 mt-[20px]" />
                </div>
                <!--------------------->

                <!-- Dashboard Content -->
                <div class="p-8 pt-30">
                    <!-- Stats Grid -->
                    <div class="p-2">
                        <!-- Search Bar -->
                        <div class="card mb-8">
                            <div class="card-body">
                                <div class="relative flex items-center">
                                    <form method="GET" action="#" class="flex items-center w-full">
                                        @csrf
                                        <input placeholder="Search medicine"
                                            class="ml-3 form-control w-80 pl-4 pr-10 py-2 border-2 border-gray-300 rounded-full focus:outline-none focus:ring-0 focus:border-green-700 hover:border-green-700 transition-all duration-300"
                                            type="text" name="search" value="{{ request('search') }}">
                                        <button type="submit"
                                            class="ml-2 text-green-500 hover:text-green-600 transition-colors duration-300">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Products Table and Form Wrapper -->
                        <div class="flex space-x-6">
                            <!-- Table Section -->
                            <div class="flex-1 overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left text-gray-800 dark:text-gray-600 border border-gray-300">
                                    <thead class="text-xs text-white uppercase bg-gray-800">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 border">Product name</th>
                                            <th scope="col" class="px-6 py-3 border">Category</th>
                                            <th scope="col" class="px-6 py-3 border">Supplier</th>
                                            <th scope="col" class="px-6 py-3 border">Quantity</th>
                                            <th scope="col" class="px-6 py-3 border">Unit Price</th>
                                            <th scope="col" class="px-6 py-3 border">Expiry Date</th>
                                            <th scope="col" class="px-6 py-3 border">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $medicine)
                                            <tr class="bg-white border-b">

                                                <td class="px-6 py-4 border">{{ $medicine->medicine_name }}</td>
                                                <td class="px-6 py-4 border">{{ $medicine->category->category_name }}
                                                </td>
                                                <td class="px-6 py-4 border">{{ $medicine->supplier->supplier_name }}
                                                </td>
                                                <td class="px-6 py-4 border">{{ $medicine->quantity }}</td>
                                                <td class="px-6 py-4 border">{{ $medicine->unit_price }}</td>
                                                <td class="px-6 py-4 border">{{ $medicine->expiry_date }}</td>
                                                <td class="px-6 py-4 border">
                                                    <button
                                                        class="bg-green-500 text-white px-4 py-2 rounded-md">Edit</button>
                                                    <button
                                                        class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Form Section -->
                            <div class="w-1/3 bg-gray-100 p-6 rounded-md shadow-md">
                                <div class="mb-4">
                                    <div class="mx-auto">
                                        <div x-data="{ open: false }" class="text-center">
                                            <button @click="open = true"
                                                class="bg-blue-500 text-white py-3 px-2 hover: w-full">
                                                [F1] New Transaction
                                            </button>
                                            <!-- Modal -->

                                            <div x-show="open"
                                                class="fixed inset-0 flex items-center justify-center bg-black opacity-95"
                                                @keydown.window="if ($event.key === 'F1') { $event.preventDefault(); open = true; }">
                                                <div
                                                    class="w-[80%] bg-white p-6 rounded-lg shadow-lg max-w-auto border-2 border-black">
                                                    <!-- Modal header -->
                                                    <div class="flex justify-between items-center mb-4">
                                                        <p class="text-2xl font-bold text-gray-800">Add Transaction</p>
                                                        <button @click="open = false"
                                                            class="text-black text-xl hover:text-gray-600 transition">X</button>
                                                    </div>

                                                    <div class="overflow-x-auto shadow-md rounded-lg">
                                                        <table class="min-w-full table-auto">
                                                            <thead>
                                                                <tr
                                                                    class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                                                                    <th class="px-6 py-3 border-b">ID</th>
                                                                    <th class="px-6 py-3 border-b">Medicine Name</th>
                                                                    <th class="px-6 py-3 border-b">Category</th>
                                                                    <th class="px-6 py-3 border-b">Supplier</th>
                                                                    <th class="px-6 py-3 border-b">Quantity</th>
                                                                    <th class="px-6 py-3 border-b">Unit Price</th>
                                                                    <th class="px-6 py-3 border-b">Expiry Date</th>

                                                                    <th class="px-6 py-3 border-b text-center">Actions
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($medicines as $medicine)
                                                                    <tr class="hover:bg-gray-50">
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->id }}</td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->medicine_name }}</td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->category->category_name }}
                                                                        </td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->supplier->supplier_name }}
                                                                        </td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->quantity }}</td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->unit_price }}</td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->expiry_date }}</td>
                                                                        <td class="px-6 py-3 border-b text-gray-700">
                                                                            {{ $medicine->manufacturer }}</td>
                                                                        <td class="px-6 py-3 border-b text-center">

                                                                            <div x-data="{ open: false }">
                                                                                <!-- Button to open the modal -->
                                                                                <button @click="open = true"
                                                                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Open
                                                                                    Modal</button>

                                                                                <!-- Modal -->
                                                                                <div x-show="open"
                                                                                    class="fixed inset-0 bg-gray-800 bg-opacity-100 flex justify-center items-center z-50"
                                                                                    @click.self="open = false">
                                                                                    <div
                                                                                        class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
                                                                                        <!-- Close button -->
                                                                                        <span
                                                                                            class="absolute top-4 right-4 text-2xl font-bold cursor-pointer text-gray-500 hover:text-gray-700"
                                                                                            @click="open = false">&times;</span>

                                                                                        <!-- Modal Content -->
                                                                                        <h2
                                                                                            class="text-xl font-semibold text-gray-800 mb-4">
                                                                                            Modal Title</h2>
                                                                                        <p class="text-gray-600">This
                                                                                            is a simple Alpine.js modal
                                                                                            example styled with Tailwind
                                                                                            CSS!</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <script>
                function confirmLogout() {
                    Swal.fire({
                        title: 'Are you sure you want to logout?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#017165',
                        confirmButtonText: 'Yes, logout',

                        cancelButtonColor: '#E23232',
                        cancelButtonText: 'Cancel'

                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logoutForm').submit(); // Submit the form if confirmed
                        }
                    });
                }
            </script>
            
        @else
            <h1>welcome unknown</h1>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
