<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PointOfSales;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('myApp.login');
})->name('login-form');

Route::get('/register-form', function () {
    return view('myApp.signup');
})->name('register-form');


Route::middleware(['auth'])->group(function () 
{
    //ADMIN ROUTES
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        
        Route::get('/main-dashboard', function () {
            return view('myApp.dashboard');
        })->name('main-dashboard'); 

        Route::controller(CategoryController::class)->group(function (){
            //CATEGORY
            Route::get('/category','show_category_dashboard')->name('categoryDashboard');  // Medicine dashboard
            Route::post('/add_category', 'add_category')->name('add_category');
            Route::put('/update_category/{id}','update_category')->name('update_category');
            Route::delete('/delete_category/{id}','delete_category')->name('delete_category');
            Route::get('/searchCategory', 'searchCategory')->name('searchCategory');
        });
        Route::controller(MedicineController::class)->group(function (){
            //MEDICINE
            Route::get('/medicine','show_med_dashboard')->name('medicineDashboard');  // Medicine dashboard
            Route::post('/medicine',  'add_Medicine')->name('medicines_store');
            Route::put('/update_medicine/{id}','update_medicine')->name('update_medicine');
            Route::delete('/delete_medicine/{id}','delete_medicine')->name('delete_medicine'); 
            Route::get('/searchMedicine', 'searchMedicine')->name('searchMedicine');
        });
        Route::controller(SupplierController::class)->group(function (){
            //SUPPLIER
            Route::get('/supplier','index')->name('supplierDashboard');
            Route::post('/supplier',  'add_supplier')->name('add_supplier');
            Route::put('/update_supplier/{id}','update_supplier')->name('update_supplier');
            Route::delete('/delete_supplier/{id}','delete_supplier')->name('delete_supplier');
            //sdasdasdasdsa
        });
    });
  
    //STAFF ROUTE
    Route::middleware(['role:staff'])->prefix('staff')->name('staff.')->group(function () {
    
        // Route::get('/main-dashboard', function () {
        //     return view('myApp.dashboard');
        // })->name('main_staff_dashboard'); 

        Route::controller(PointOfSales::class)->group(function (){
            Route::get('/pointofsales', 'index')->name('staffDashboard');
        });

    });

});
























        // Route::controller(CategoryController::class)->group(function () 
        // {
        //     // Route::get('/main-dashboard', 'index')->name('main-dashboard');

        //     //category
        //     Route::post('/add_event', 'add_event')->name('add_event');
        //     Route::put('/update_event/{id}', 'update_event')->name('update_event');
        //     Route::delete('/delete_event/{id}', 'delete_event')->name('delete_event');
        // });

    
    // Route::controller(CategoryController::class)->group(function () 
    // {
    //     //category
    //     Route::post('/add_category', 'add_category')->name('add_category');
    // });




// Route::get('/jandergwapo', function () {
//     return view("casabuena");
// });



// Route::get('/albit', function (){
//     return view('try');
// });

// Route::get('/home', function (){
//     return view('laravel.index');
// })->name('index');

// Route::get('/gallery-ni-sya', function (){
//     return view('laravel.gallery');
// })->name('gallery');

// Route::get('/service-ni-sya', function (){
//     return view('laravel.service');
// })->name('servicesAko');

// Route::get('/about-ni-sya', function (){
//     return view('laravel.about');
// })->name('about');

// Route::get('/calculator', function (){
//     return view('laravel.calculator');
// })->name('calculator');



// // Using Manual and Individual Calling of Routes
// Route::get('new-calculator', [MyCalculatorController::class, 'showCalculator'])->name('show');
// Route::post('new-calculator', [MyCalculatorController::class, 'calculateSum'])->name('showCalculate');

// // Using Route Group without Route Name
// Route::controller(MyCalculatorController::class)->group(function () {
//     Route::get('new-calculator', 'showCalculator');
//     Route::post('new-calculator', 'calculateSum');
// });

// Using Route Group with Route Name
// Route::controller(MyCalculatorController::class)->group(function () {
//     Route::get('new-calculator', 'showCalculator')->name('show');
//     Route::post('new-calculator', 'calculateSum')->name('showCalculate');
// });

// Using prefixes in Route:
// Route::controller(MyCalculatorController::class)->prefix('admin')->group(function () {
//     Route::get('new-calculator', 'showCalculator')->name('show');
//     Route::post('new-calculator', 'calculateSum')->name('showCalculate');

// });


// Route::prefix('admin')->group(function () {
//     Route::controller(MyCalculatorController::class)->group(function () {
//             Route::get('new-calculator', 'showCalculator')->name('show');
//             Route::post('new-calculator', 'calculateSum')->name('showCalculate');
//         });
// });

// // Using Resource Controller
// Route::resource('jandergwapo', PhotoController::class);



// Route::middleware([RequestLogin::class])->prefix('jander')->group(function () {
//     Route::controller(MyCalculatorController::class)->group(function () {
//         //this is where your route group controller using get or post
//     });
//     Route::get('/loginForm', function () {
//         return view('middlewaredemo.login');
//     })->name('login_page');

//     Route::post('/loginForm');

//     Route::get('/dashboardd', function (){
//         return view('middlewaredemo.dashboard');
//     })->name('dashboardd');

// });























// Route::get('/myhome', function () {
//     return view('home');
// })->name('gotohome');

// //this code is page1
// Route::get('/page1', function () {
//     return view('page1');
// })->name('gotopage1');







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
