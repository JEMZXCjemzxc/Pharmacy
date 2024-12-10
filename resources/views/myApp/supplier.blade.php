
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

        

            @if (session('success'))
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
            @endif

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
                        <li>
                            <a href="{{ route('admin.categoryDashboard') }}"
                                class="flex items-center space-x-3 px-4 py-2 text-[#017165] hover:bg-gray-100 rounded-lg">
                                <i class="fa-solid fa-list"></i>
                                <span>Category</span>
                            </a>
                        </li>

                        <li x-data="{ open: false }" class="relative" x-cloak>
                            <!-- Dropdown Trigger -->
                            <a @click="open = !open"
                                class="flex items-center justify-between px-4 py-2 text-[#017165] bg-yellow-300 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <i class="fa-solid fa-truck-field"></i>
                                    <span>Supplier</span>
                                </div>
                                <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
                            </a>
                            <!-- Dropdown Menu -->
                            <ul x-show="open" @click.outside="open = false"
                                class="absolute left-0 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                <!-- Add Medicine Modal-->
                                <li>
                                    <!-- modal code-->
                                    <div x-data="{ open: false }" x-cloak class="hover:bg-gray-100 hover:rounded-lg">
                                        <button @click="open = true" class="text-[#017165] text-sm py-2 rounded ml-20">
                                            <i class="fa-solid fa-plus"></i> Add
                                            Suppliers
                                        </button>
                                        <div x-show="open"
                                            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                                            <div @click.away="open = false"
                                                class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                                                {{-- modal content here --}}
                                                <div class="relative">
                                                    <h1 class="text-3xl font-bold mb-8 text-center text-[#017165]">Add
                                                        Suppliers</h1>
                                                    <div class="mb-8">
                                                        {{-- Purpose of enctype:
Handling File Uploads:
When you use <input type="file"> to allow users to upload files, the form's encoding type must be set to enctype="multipart/form-data". This ensures that files are correctly transmitted to the server. --}}

                                                        <form action="{{ route('admin.add_supplier') }}"
                                                            enctype="multipart/form-data" method="POST"
                                                            class="max-w-md p-6 bg-white shadow-md rounded-lg">
                                                            @csrf
                                                            <table class="w-full table-auto">
                                                                <tr class="mb-4">
                                                                    <th
                                                                        class="py-2 text-left text-sm font-medium text-gray-700">
                                                                        Supplier Name</th>
                                                                    <td class="py-2">
                                                                        <input type="text" name="supplier_name"
                                                                            placeholder="Supplier name"
                                                                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-[#017165]">
                                                                    </td>
                                                                </tr>
                                                                <tr class="mb-4">
                                                                    <th
                                                                        class="py-2 text-left text-sm font-medium text-gray-700">
                                                                        Contact Info</th>
                                                                    <td class="py-2">
                                                                        <input type="text" name="contact_info"
                                                                            placeholder="Contact info"
                                                                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-[#017165]">
                                                                    </td>
                                                                </tr>

                                                                <tr class="mb-4">
                                                                    <th
                                                                        class="py-2 text-left text-sm font-medium text-gray-700">
                                                                        Image</th>
                                                                    <td class="py-2">
                                                                        <input type="file" name="image"
                                                                            id="image"
                                                                            class="w-full px-4 py-2 mt-1 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                                                            accept="image/*">
                                                                        @error('image')
                                                                            <p class="text-red-500 text-sm mt-1">
                                                                                {{ $message }}</p>
                                                                        @enderror
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="2" class="text-center">
                                                                        <button type="submit"
                                                                            class="w-full bg-[#017165] hover:bg-[#1a5a53] text-white font-bold py-2 px-4 rounded transition duration-300">Submit</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- modal content here --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Add Medicine -->
                            </ul>
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
            <!----------------------------------------------------------------side bar--------------------------------------------------------------->

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
                                    Suppliers
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
                <div class="mt-8 space-y-4">
                    @php
                    $suppliersCount = \App\Models\Supplier::count();
                @endphp

                @if ($suppliersCount == 0)
                    <h2 class="text-xl font-semibold text-[#ff3939] flex items-center ml-5">
                        <i class="fa-solid fa-truck-field mr-2"></i> No Suppliers yet, add supplier
                @endif


                    @foreach ($suppliers as $supplier)
                        <div class="bg-white p-6 shadow-sm rounded border border-gray-200">
                            <div class="flex justify-between items-center">
                                <!-- Supplier Info -->
                                <div class="flex items-center justify-between bg-white p-4 shadow-md rounded mb-4">
                                    <!-- Left Section: Supplier Name and Contact Info -->
                                    <div>
                                        <h2 class="text-xl font-semibold text-[#017165] flex items-center">
                                            <i class="fa-solid fa-truck-field mr-2"></i> Supplier:
                                        </h2>
                                        <p class="text-lg font-semibold text-[#30d140]">{{ $supplier->supplier_name }}
                                        </p>

                                        <h3 class="text-l font-semibold text-[#017165] flex items-center mt-2">
                                            <i class="fa-regular fa-id-card mr-2"></i> Contact Info:
                                        </h3>
                                        <p class="text-lg font-semibold text-[#30d140]">{{ $supplier->contact_info }}
                                        </p>
                                    </div>

                                    <!-- Right Section: Supplier Image -->
                                    <div class="ml-4">
                                        @if ($supplier->image)
                                            <img src="{{ asset('storage/' . $supplier->image) }}"
                                                alt="{{ $supplier->supplier_name }}"
                                                class="w-16 h-16 object-cover rounded-full">
                                        @else
                                            <div
                                                class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                                                <span class="text-gray-500">No Image</span>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <!-- Buttons -->
                                <div class="flex space-x-2">
                                    <!-- Edit Button -->

                                    <div x-data="{ open: false }"  x-cloak> {{-- Alpine.js Directive: x-cloak is used to hide 
                                        elements while they are being rendered or until Alpine.js has finished processing and rendering them.
                                        --}}
                                        <button @click="open = true"
                                            class="bg-[#017165] hover:bg-[#1a5a53] text-white font-semibold px-4 py-2 rounded shadow">
                                            Edit Supplier
                                        </button>
                                        <div x-show="open "
                                            class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                            <div @click.away="open = true"
                                                class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                                                <div class="flex justify-between">

                                                    <button @click = "open = false">X</button>
                                                </div>
                                                {{-- modal edit supplier form inside --}}
                                                <div class="relative">
                                                    <h1 class="text-3xl font-bold mb-8 text-center text-[#017165]">
                                                        Update
                                                        Suppliers</h1>

                                                    <div class="mb-8">
                                                        <form
                                                            action="{{ route('admin.update_supplier', $supplier->id) }}"
                                                            method="POST"
                                                            class="max-w-md p-6 bg-white shadow-md rounded-lg">
                                                            @csrf
                                                            @method('PUT')
                                                            <table class="w-full table-auto">
                                                                <tr class="mb-4">
                                                                    <th
                                                                        class="py-2 text-left text-sm font-medium text-gray-700">
                                                                        Supplier Name</th>
                                                                    <td class="py-2">
                                                                        <input type="text" name="supplier_name"
                                                                            value="{{ $supplier->supplier_name }}"
                                                                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-[#017165]">
                                                                    </td>
                                                                </tr>

                                                                <tr class="mb-4">
                                                                    <th
                                                                        class="py-2 text-left text-sm font-medium text-gray-700">
                                                                        Contact Info</th>
                                                                    <td class="py-2">
                                                                        <input type="text" name="contact_info"
                                                                            value="{{ $supplier->contact_info }}"
                                                                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-[#017165]">
                                                                    </td>
                                                                </tr>

                                                                <!-- Image Upload -->
                                                                <div class="mb-4">
                                                                    <label for="image"
                                                                        class="block text-sm font-medium text-gray-700">Supplier
                                                                        Image</label>
                                                                    <input type="file" name="image"
                                                                        id="image"
                                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#017165] focus:border-[#017165]">

                                                                    @if ($supplier->image)
                                                                        <img src="{{ asset('storage/' . $supplier->image) }}"
                                                                            alt="{{ $supplier->supplier_name }}"
                                                                            class="w-20 h-20 object-cover rounded-full mt-3">
                                                                    @else
                                                                        <p class="text-sm text-gray-500 mt-2">No image
                                                                            uploaded</p>
                                                                    @endif
                                                                </div>

                                                                <tr>
                                                                    <td colspan="2" class="text-center">
                                                                        <button type="submit"
                                                                            class="w-full bg-[#017165] hover:bg-[#1a5a53] text-white font-bold py-2 px-4 rounded transition duration-300">Update
                                                                            Supplier</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.delete_supplier', $supplier->id) }}"
                                        method="POST"    
                                        onsubmit="
                                        return confirm('If you delete this Supplier, all the medicines that are part of this will be deleted! ')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded shadow">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
