<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border: 1px solid #007bff;
            border-radius: 5px;
            color: #007bff;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active span {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
    </style>

</head>

<body class="font-sans antialiased bg-white mx-auto margin">
    <div class="min-h-screen ">
        @if (Auth::user()->hasRole('admin'))

            {{-- @if (session('success'))
                <x-sweetalert type="success" :message="session('success')" />
            @endif

            @if (session('info'))
                <x-sweetalert type="info" :message="session('info')" />
            @endif

            @if (session('error'))
                <x-sweetalert type="error" :message="session('error')" />
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <!---------------------------------------------------Sidebar------------------------------------------------------------------- -->
            <aside class="fixed left-0 top-0 h-screen w-64  border-r border-gray-200 z-10 rounded-tr-[50px]">
                <div
                    class="flex items-center justify-center h-16 border-b border-gray-200 bg-[#017165] rounded-tr-[50px]">
                    <h1 class="text-xl font-bold text-white">1st Med Pharmacy</h1>
                </div>

                <nav class="p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.main-dashboard') }}"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
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

                        <!-- drop down menu for category------------------------------ -->
                        <li x-data="{ open: false }" class="relative" x-cloak>
                            <!-- Dropdown Trigger -->
                            <a @click="open = !open"
                                class="flex items-center justify-between px-4 py-2 text-[#017165] bg-yellow-300 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <i class="fa-solid fa-list"></i>
                                    <span>Category</span>
                                </div>
                                <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
                                <!-- ternary operator-->
                            </a>

                            <!-- Dropdown Menu -->
                            <ul x-show="open" @click.outside="open = false"
                                class="absolute left-0 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                <!-- Add Category -->
                                <li>

                                    <!-- modal code----------------------------------------------------->
                                    <div x-data="{ open: false }" x-cloak class="hover:bg-gray-100 hover:rounded-lg">
                                        <button @click="open = true" class="text-[#017165] text-sm py-2 rounded ml-20">
                                            <i class="fa-solid fa-plus"></i> Add
                                            Category
                                        </button>

                                        <!-- Add Modal -->
                                        <div x-show="open"
                                            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                                            <div @click.away="open = false"
                                                class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                                                <button @click="open = false"
                                                    class="absolute top-3 right-3 text-gray-600 hover:text-gray-800">✕</button>
                                                <!-- form content-->
                                                <h2 class="text-lg font-bold mb-4">Add
                                                    Category</h2>
                                                <form action="{{ route('admin.add_category') }}" method="POST"
                                                    class="space-y-4">
                                                    @csrf

                                                    <div>
                                                        <label for="category_name"
                                                            class="block text-sm font-medium text-gray-700">Category
                                                            Name</label>
                                                        <input type="text" id="category_name" name="category_name"
                                                            class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                                    </div>
                                                    <div>
                                                        <label for="description"
                                                            class="block text-sm font-medium text-gray-700">Description</label>
                                                        <textarea id="description" name="description" rows="3"
                                                            class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                                    </div>
                                                    <button type="submit"
                                                        class="w-full bg-[#017165] text-white py-2 rounded-md hover:bg-[#195852]">Add
                                                        Category</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
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

            <!---------------------------------------------------------------END-OF side bar--------------------------------------------------------------->
            <!-- Main Content ------------------->
            <main class="pl-64">
                <!--------------------------------------------------------------------------------------top bar-------------------------------------------------------->
                <div class="pt-[20px]">
                    <div
                        class="relative grid grid-cols-1 sm:flex sm:justify-between md:grid-cols-2 lg:grid-cols-4 gap-10 mb-2">
                        <!-- First Grid: Inventory and Date (Left side) -->
                        <div class="flex items-center mb-2 ml-5">
                            <div class="flex items-center">
                                <h1 class="text-3xl font-semibold text-gray-800">
                                    Categories
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
                <!-----------------=------=-------------========-----TABLES Content -------------=------------------------------------===-->
                <div class="p-8 -mt-12  ">
                    <div class="p-8">
                        <div class="container mx-auto">
                            <!-- Page Title -->
                            <h1 class="text-center text-2xl font-bold mb-6 text-gray-800">Category Management</h1>
                            <!-- Display Categories -->
                            <div class="overflow-x-auto bg-white rounded-lg shadow-md">

                                <!-- Search Form -->
                                <form action="{{ route('admin.searchCategory') }}" method="GET"
                                    class="flex items-center space-x-2">
                                    <!-- Search Input -->
                                    <div class="relative">
                                        <input type="text" name="query" placeholder="Search..."
                                            value="{{ request('query') }}"
                                            class="w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-blue-500">
                                        <!-- Magnifying Glass Icon -->
                                        <span class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                    </div>
                                    <!-- Search Button -->
                                    <button type="submit"
                                        class="px-4 py-1 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        Search
                                    </button>
                                </form>
                                <!-- Search Form -->

                                <table class="min-w-full border border-gray-300">
                                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                                        <tr>
                                            <th class="px-6 py-3 border-b text-left">#</th>
                                            <th class="px-6 py-3 border-b text-left">Category Name</th>
                                            <th class="px-6 py-3 border-b text-left">Description</th>
                                            <th class="px-6 py-3 border-b text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($categories->isEmpty())
                                            <tr>
                                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No
                                                    categories available.</td>
                                            </tr>
                                        @else
                                            @foreach ($categories as $category)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-3 border-b">{{ $category->id }}</td>
                                                    <td class="px-6 py-3 border-b">{{ $category->category_name }}</td>
                                                    <td class="px-6 py-3 border-b">{{ $category->description }}</td>
                                                    <td class="px-6 py-3 border-b">
                                                        <div class="flex justify-center space-x-2 ">
                                                            <!-- Edit category Button -->
                                                            <div x-data="{ open: false }" x-cloak>
                                                                {{-- Alpine.js Directive: x-cloak is used to hide 
                                        elements while they are being rendered or until Alpine.js has finished processing and rendering them.
                                        --}}
                                                                <button @click="open = true"
                                                                    class="bg-[#017165] text-white px-3 py-2 text-sm rounded-md hover:bg-[#1a5c55]">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </button>
                                                                <!-- Edit category Modal -->
                                                                <div x-show="open"
                                                                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                                                                    <div @click.away="open = false"
                                                                        class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                                                                        <button @click="open = false"
                                                                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-800">✕</button>
                                                                        <h2 class="text-lg font-bold mb-4">Edit
                                                                            Category</h2>
                                                                        <form
                                                                            action="{{ route('admin.update_category', $category->id) }}"
                                                                            method="POST" class="space-y-4">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div>
                                                                                <label for="category_name"
                                                                                    class="block text-sm font-medium text-gray-700">Category
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    id="category_name"
                                                                                    name="category_name"
                                                                                    value="{{ $category->category_name }}"
                                                                                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                                                            </div>
                                                                            <div>
                                                                                <label for="description"
                                                                                    class="block text-sm font-medium text-gray-700">Description</label>
                                                                                <textarea id="description" name="description" rows="3"
                                                                                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $category->description }}</textarea>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="w-full bg-[#017165] text-white py-2 rounded-md hover:bg-[#195852]">Update
                                                                                Category
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Delete Button -->
                                                            <form
                                                                action="{{ route('admin.delete_category', $category->id) }}"
                                                                method="POST"
                                                                onsubmit="
                                                                return confirm('If you delete this category, all the medicines that are part of this will be deleted! ')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="bg-red-500 text-white px-3 py-2 text-sm rounded-md hover:bg-red-600">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (!$query)
                                {{-- if walay gi search i display tanan data sa table --}}
                                <div class="mt-4">
                                    {{ $categories->links() }} <!-- This will display the pagination controls -->
                                </div>
                            @else
                                <!-- prompt for search result -->
                                <h1 class="text-[14px] font-bold text-gray-400 mb-6 mt-6 ml-2">
                                    Search Results for "{{ $query }}" ... {{-- if naay gi search mu gawas ni --}}
                                </h1>
                                <!-- propmt for search -->
                            @endif
                        </div>
                    </div>

                    <!-----------==============================================================-- Display Medicines ------------------------------------------------=====================------->
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

            </main>
            <!-----------------=------=-------------========-----Dashboard Content -------------=------------------------------------===-->
        @elseif (Auth::user()->hasRole('judge'))
            <h1 class="text-red-500">Welcome Judge</h1>
        @else
            <h1 class="text-red-500">Welcome Staff</h1>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
