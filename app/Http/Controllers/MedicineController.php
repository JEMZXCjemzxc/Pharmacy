<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MedicineController extends Controller
{
    //
    public function show_med_dashboard(){ // index
        $categories = Category::all();
        $medicines = Medicine::paginate(4);
        $suppliers = Supplier::all();
        $query = null;
        return view("myApp.medicine",compact('categories' , 'medicines', 'suppliers','query'));
   }
       // Store a new medicine
       public function add_Medicine(Request $request) //store
       {
        //   dd($request->all());
           // Validate the incoming data

           try {
                $validated = $request->validate([
                    'medicine_name' => 'required|string|max:100|unique:medicines,medicine_name',
                    'category_id' => 'required|exists:categories,id', // Ensure category exists
                    'supplier_id' =>'required|exists:suppliers,id',
                    'quantity' => 'required|integer|min:0',
                    'unit_price' => 'required|numeric|min:0',
                    'expiry_date' => 'required|date|after:today',
                ]);
                // Create a new medicine record
               Medicine::create($validated);
                // $medicine= new Medicine();
        
                // Redirect back with a success message
                return redirect()->route('admin.medicineDashboard')->with('success', 'Medicine added successfully!');
           }catch(\Exception $e){

              // Check if the validation error is due to the unique constraint on medicine_name
            if (array_key_exists('medicine_name', $e->errors())) {
                return redirect()->route('admin.medicineDashboard')->with('error', 'Medicine name already exists!');
            }
            
           elseif (array_key_exists('expiry_date', $e->errors())) {
                return redirect()->route('admin.medicineDashboard')->with('error', 'Invalid date!');
            }


                return redirect()->route('admin.medicineDashboard')->with('error', 'Failed to add the medicine, no supplier or no category');
           }
       }
       public function update_medicine(Request $request, $id)
       {
           $medicines = Medicine::findOrFail($id);
           $request->validate([
            Rule::unique('medicines', 'medicine_name')->ignore($medicines->id),// maka edit ka sa current item bisan parihag ngan
                'category_id' => 'required|exists:categories,id', // Ensure category exists
                'supplier_id' => 'required|exists:suppliers,id',
                'quantity' => 'required|integer|min:0',
                'unit_price' => 'required|numeric|min:0',
                'expiry_date' => 'required|date|after:today',
           ]);
           // dd($categories->update($request->all()));
           $medicines->update($request->all());
           return redirect()->route('admin.medicineDashboard')->with('success', 'Medicine Updated Successfully!');
       }

       public function delete_medicine(Request $request,$id)
       {
           try {
               // Find the category
               $medicines = Medicine::findOrFail($id);

               $medicines->delete();
               
               return redirect()->route('admin.medicineDashboard')->with('success', 'Medicine deleted successfully!');
           } catch (\Exception $e) {
               return redirect()->route('admin.medicineDashboard')->with('error', 'Failed to delete the medicine!');
           }
       }


       public function searchMedicine(Request $request)
       {
           $query = $request->input('query'); // Get the search query from the request
       
           // Fetch all categories or search by name/description based on query
           $medicines = Medicine::when($query, function ($q) use ($query) {
               return $q->where('medicine_name', 'LIKE', "%{$query}%")
                        ->orWhere('supplier_id', 'LIKE', "%{$query}%");
           })->paginate(4); // Paginate the results

           // i fetch nato ang data sa cetegories and suppliers table kay sa atong medicine dashboard, nagpa display man tag categ og supplier
           $categories = Category::all();
           $suppliers = Supplier::all();
       
           // Return the results to the view
           return view('myApp.medicine', compact('medicines', 'query', 'categories','suppliers'));
       }
       
}
