<div class="text-center mt-5 mb-5">
    <h1>List of Events</h1>

    <div x-data="{ open: false }">
        <button @click="open = true" class="mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded hover:bg-blue-700">
            <i class="fa-solid fa-plus fa-xs" style="color: #ffffff;"></i> Add Event
        </button>
        <div x-show="open"
            class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div @click.away="open = true" class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">

                <div class="flex justify-between">
                    <p class="font-bold">Add Event</p>
                    <button @click = "open = false">X</button>
                </div>
                <hr class="my-4 w-full border border-black">
                <form action="{{ route('admin.add_event') }}" method="POST" class="mt-5">
                    @csrf
                    <div>
                        <label for="event_name" class="flex justify-start">Event Name: </label>
                        <input type="text" id="event_name" name="event_name"
                            class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                  leading-tight focus:outline-none focus:shadow-outline @error('event_name') is-invalid @enderror"
                            required>
                    </div>
                    <div>
                        <label for="event_description" class="flex justify-start">Description: </label>
                        <input type="text" id="event_description" name="event_description"
                            class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                  leading-tight focus:outline-none focus:shadow-outline @error('event_description') is-invalid @enderror"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 mt-5 mb-5 text-center text-white rounded-md py-2 px-2 hover:bg-blue-800">
                        ADD EVENT
                    </button>
                </form>
            </div>
        </div>
    </div>


    <div x-data="{ open: false }">

        @if ($events->isEmpty())
            <button class="hover:bg-red-800 mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded ">
                <i class="fa-solid fa-plus fa-xs" style="color: #ffffff;"></i> Add Category
            </button>
        @else
            <button @click="open = true"
                class="mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded 
                                            hover:bg-blue-700">
                <i class="fa-solid fa-plus fa-xs" style="color: #ffffff;"></i> Add Category
            </button>
        @endif


        <div x-show="open"
            class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div @click.away="open = true"
                class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">

                <div class="flex justify-between">
                    <p class="font-bold">Add Category</p>
                    <button @click = "open = false">X</button>
                </div>
                <hr class="my-4 w-full border border-black">

                <form action="{{ route('admin.add_category') }}" method="POST" class="mt-5">
                    @csrf

                    <div>
                        <label for="event_id" class="flex justify-start">Select Event: </label>
                        <select name="event_id" id="event_id"
                            class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                                                 leading-tight focus:outline-none focus:shadow-outline @error('event_name') is-invalid @enderror">
                            @if ($events->isEmpty())
                                <option value="">No events listed</option>
                            @else
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="category_name" class="flex justify-start">Category Name: </label>
                        <input type="text" id="category_name" name="category_name"
                            class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                  leading-tight focus:outline-none focus:shadow-outline @error('category_name') is-invalid @enderror"
                            required>
                    </div>
                    <div>
                        <label for="category_description" class="flex justify-start">Category Description:
                        </label>
                        <input type="text" id="category_description" name="category_description"
                            class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                  leading-tight focus:outline-none focus:shadow-outline @error('category_description') is-invalid @enderror"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 mt-5 mb-5 text-center text-white rounded-md py-2 px-2 hover:bg-blue-800">
                        ADD CATEGORY
                    </button>
                </form>
            </div>
        </div>
    </div>


    <table class="w-72 mx-auto border-2 border-black">
        <thead>
            <th class="border-2 border-black">ID</th>
            <th class="border-2 border-black">Event Name</th>
            <th class="border-2 border-black"> Description</th>
            <th class="border-2 border-black">Date Created</th>
            <th class="border-2 border-black">Action</th>
        </thead>
        <tbody>
            @if ($events->isEmpty())
                <tr class="border-2 border-black p-2">
                    <td class="border-2 border-black">No data available</td>
                </tr>
            @else
                @foreach ($events as $event)
                    <tr class="border-2 border-black p-2">
                        <td class="border-2 border-black">{{ $event->id }}</td>
                        <td class="border-2 border-black">{{ $event->event_name }}</td>
                        <td class="border-2 border-black">{{ $event->event_description }}</td>
                        <td class="border-2 border-black">{{ $event->created_at }}</td>
                        <td class="border-2 border-black">
                            <div class="flex justify-center">
                                <!-- THIS IS UPDATE -->
                                <div x-data="{ open: false }" class="">
                                    <button @click="open = true"
                                        class=" bg-blue-500 text-white text-sm px-2 py-2 rounded hover:bg-blue-700">
                                        <i class="fa-regular fa-pen-to-square" class="text-white"></i>
                                    </button>
                                    <div x-show="open"
                                        class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                        <div @click.away="open = true"
                                            class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">

                                            <div class="flex justify-between">
                                                <p class="font-bold">Edit Event</p>
                                                <button @click = "open = false">X</button>
                                            </div>
                                            <hr class="my-4 w-full border border-black">
                                            <form action="{{ route('admin.update_event', $event->id) }}"
                                                method="POST" class="mt-5">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="event_name" class="flex justify-start">Event Name:
                                                    </label>
                                                    <input type="text" id="event_name" name="event_name"
                                                        value ="{{ $event->event_name }}"
                                                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                                            leading-tight focus:outline-none focus:shadow-outline @error('event_name') is-invalid @enderror"
                                                        required>
                                                </div>
                                                <div>
                                                    <label for="event_description"
                                                        class="flex justify-start">Description: </label>
                                                    <input type="text" id="event_description"
                                                        name="event_description"
                                                        value ="{{ $event->event_description }}"
                                                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                                            leading-tight focus:outline-none focus:shadow-outline @error('event_description') is-invalid @enderror"
                                                        required>
                                                </div>
                                                <button type="submit"
                                                    class="w-full bg-blue-500 mt-5 mb-5 text-center text-white rounded-md py-2 px-2 hover:bg-blue-800">
                                                    SAVE CHANGES
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;&nbsp;



                                <div x-data="{ open: false }" class="">
                                    <button @click="open = true"
                                        class=" bg-blue-500 text-white text-sm px-2 py-2 rounded hover:bg-blue-700">
                                        <i class="fa-regular fa-trash-can" class="text-white"></i>
                                    </button>
                                    <div x-show="open"
                                        class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                        <div @click.away="open = true"
                                            class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">

                                            <div class="flex justify-between">
                                                <p class="font-bold">Delete Event</p>
                                                <button @click = "open = false">X</button>
                                            </div>
                                            <hr class="my-4 w-full border border-black">
                                            <form action="{{ route('admin.delete_event', $event->id) }}"
                                                method="POST" class="mt-5">
                                                @csrf
                                                @method('DELETE')
                                                <div>
                                                    <label for="event_name" class="flex justify-start">Event Name:
                                                    </label>
                                                    <input type="text" id="event_name" name="event_name"
                                                        value ="{{ $event->event_name }}"
                                                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                                            leading-tight focus:outline-none focus:shadow-outline @error('event_name') is-invalid @enderror"
                                                        required readonly>
                                                </div>
                                                <div>
                                                    <label for="event_description"
                                                        class="flex justify-start">Description: </label>
                                                    <input type="text" id="event_description"
                                                        name="event_description"
                                                        value ="{{ $event->event_description }}"
                                                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 
                                                            leading-tight focus:outline-none focus:shadow-outline @error('event_description') is-invalid @enderror"
                                                        required readonly>
                                                </div>
                                                <button type="submit"
                                                    class="w-full bg-blue-500 mt-5 mb-5 text-center text-white rounded-md py-2 px-2 hover:bg-blue-800">
                                                    DELETE EVENT
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<h3 class="flex justify-center mt-10">LIST OF CATEGORIES</h3>
<div class="flex justify-center mt-10">

    <table class="w-72 mx-auto border-2 border-black">
        <thead>
            <th class="border-2 border-black">ID</th>
            <th class="border-2 border-black">Category Name</th>
            <th class="border-2 border-black">Category Description</th>
            <th class="border-2 border-black">Event ID</th>
            <th class="border-2 border-black">Event Name</th>
            <th class="border-2 border-black">Date Created</th>
            <th class="border-2 border-black">Action</th>
        </thead>
        <tbody>
            @if ($categories->isEmpty())
                <tr class="border-2 border-black p-2">
                    <td class="border-2 border-black">No data available</td>
                </tr>
            @else
                @foreach ($categories as $category)
                    <tr class="border-2 border-black p-2">
                        <td class="border-2 border-black">{{ $category->id }}</td>
                        <td class="border-2 border-black">{{ $category->category_name }}</td>
                        <td class="border-2 border-black">{{ $category->category_description }}</td>
                        <td class="border-2 border-black">{{ $category->event_id }}</td>
                        <td class="border-2 border-black">{{ $category->event->event_name }}</td>
                        <td class="border-2 border-black">{{ $category->created_at }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>





{{-- // namespace App\Http\Controllers;
// use \App\Models\Event;
// use \App\Models\Category;
// use Illuminate\Http\Request;

// class CategoryController extends Controller
{
    // public function add_category(Request $request)
    // {
    //     $request->validate([
    //         'event_id' => 'required|exists:events,id',
    //         'category_name' => 'required|string|max:255',
    //         'category_description' => 'required|string|max:255',    
    //     ]);

    //     $category = new Category();
    //     $category->event_id = $request->event_id;
    //     $category->category_name = $->category_name;
    //     $category->category_description =request $request->category_description;
    //     $category->save();

    //     return redirect()->back()->with('success', 'Category added successfully!');

    // }
} --}}

<h1>Search Results for "{{ $query }}"</h1>
@if ($categories->isEmpty() && $medicines->isEmpty())
    <p>No results found.</p>
@else
    <h2>Categories</h2>
    @if (!$categories->isEmpty())
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->category_name }} - {{ $category->description }}</li>
            @endforeach
        </ul>
    @else
        <p>No categories found.</p>
    @endif

    <h2>Medicines</h2>
    @if (!$medicines->isEmpty())
        <ul>
            @foreach ($medicines as $medicine)
                <li>{{ $medicine->medicine_name }} - {{ $medicine->description }}</li>
            @endforeach
        </ul>
    @else
        <p>No medicines found.</p>
    @endif

    <!-- design -->

    <div class="container mx-auto p-6 bg-gray-100">
        <!-- Search Results Header -->
        <h1 class="text-xs font-bold text-green-500 mb-6">
            Search Results for "{{ $query }}"
        </h1>
    
        @if ($categories->isEmpty() && $medicines->isEmpty())
            <p class="text-center text-red-500 font-semibold">No results found.</p>
        @else
            <!-- Categories Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Categories</h2>
                @if (!$categories->isEmpty())
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($categories as $category)
                            <li class="bg-white shadow rounded-lg p-4">
                                <h3 class="text-lg font-bold text-blue-500">
                                    {{ $category->category_name }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ $category->description }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No categories found.</p>
                @endif
            </div>
    
            <!-- Medicines Section -->
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Medicines</h2>
                @if (!$medicines->isEmpty())
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($medicines as $medicine)
                            <li class="bg-white shadow rounded-lg p-4">
                                <h3 class="text-lg font-bold text-blue-500">
                                    {{ $medicine->medicine_name }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ $medicine->description }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 text-xs text-red-500">No medicines found.</p>
                @endif
            </div>
        @endif
    </div>


<!-- modal code-->
<div x-data="{ open: false }">
    <button @click="open = true"
        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded hover:bg-blue-700">
        <i class="fa-solid fa-plus fa-xs" style="color: #ffffff;"></i> Add Medicine
    </button>
    <div x-show="open"
        class="fixed mx-auto p-8  inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div @click.away="open = true"
            class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
           
            <div class="flex justify-between">
                <p class="font-bold">Add Medicine</p>
                <button @click = "open = false">X</button>
            </div>
        </div>
    </div>
</div>






<!--div hide li-->
<li x-data="{ open: false }" class="relative" x-cloak>
    <!-- Dropdown Trigger -->
    <a @click="open = !open"
        class="flex items-center justify-between px-4 py-2 text-[#017165] bg-yellow-300 hover:bg-gray-100 rounded-lg">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-pills"></i>
            <span>Medicine</span>
        </div>
        <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
    </a>
    <!-- Dropdown Menu -->
    <ul x-show="open" @click.outside="open = false"
        class="absolute left-0 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
        <!-- Add Medicine Modal-->
        <li>
            <!-- modal code-->
            <div x-data="{ open: false }" x-cloak>
                <button @click="open = true"
                    class="mb-4 mt-2 bg-[#017165] text-white text-sm px-3 py-2 rounded hover:bg-[#195851]">
                    <i class="fa-solid fa-pills fa-xs" style="color: #ffffff;"></i>&nbsp; Add
                    Suppliers
                </button>
                 <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                    <div @click.away="open = false"
                    class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    sda
                    </div>
                 </div>
              
            </div>
        </li>
        <!-- Add Medicine -->
    </ul>
</li>





                {{-- <div class="p-8 pt-30">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">


                        @php
                            $medicineCount = \App\Models\Medicine::count();
                            $categoriesCount = \App\Models\Category::count();
                            $suppliersCount = \App\Models\Supplier::count();
                        @endphp


                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-pops text-gray-600">No. of Category</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $categoriesCount }}</p>
                                </div>
                                <div class="p-3 bg-yellow-50 rounded-full">
                                    {{-- icons --}}
                {{-- <i class="fa-solid fa-pills h-6 w-6 text-blue-500 "></i>
                                </div>
                            </div>

                            @if ($categoriesCount == 0)
                                <p class="mt-2 text-sm text-red-700">
                                    "No categories yet. The meds are just chilling!"</p>
                            @elseif ($categoriesCount < 3)
                                <p class="mt-2 text-sm text-red-500">"Less than 3 Categories—it's a quiet day at the
                                    pharmacy!"</p>
                            @else
                                <p class="mt-2 text-sm text-green-600">"More than 3 Categories—looks like we're the
                                    hot spot today!"</p>
                            @endif
                        </div>

                        <!-- Total Medicine -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-pops text-gray-600">Total Medicine</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $medicineCount }}</p>
                                </div>
                                <div class="p-3 bg-green-50 rounded-full">
                                    <i class="fa-solid fa-pills h-6 w-6 text-green-500 "></i>
                                </div>
                            </div>

                            @if ($medicineCount == 0)
                                <p class="mt-2 text-sm text-red-700">Warning: Out of Stock!</p>
                            @elseif ($medicineCount < 3)
                                <p class="mt-2 text-sm text-red-500">Warning: Out of Stocks soon!</p>
                            @else
                                <p class="mt-2 text-sm text-green-600">Stocks are healthy!</p>
                            @endif
                        </div>

                        <!-- Suppliers -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-pops text-gray-600">Total Suppliers</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $suppliersCount }}</p>
                                </div>
                                <div class="p-3 bg-yellow-50 rounded-full">
                                    <i class="fa-solid fa-pills text-red-500"></i>
                                </div>
                            </div>

                            @if ($suppliersCount == 0)
                                <p class="mt-2 text-sm text-red-700">
                                    "No suppliers yet."</p>
                            @elseif ($suppliersCount < 3)
                                <p class="mt-2 text-sm text-red-500">"Less than 3 suppliers"</p>
                            @else
                                <p class="mt-2 text-sm text-green-600">"Suppliers goes brrrr!"</p>
                            @endif

                        </div>
                    </div>
                </div> --}}