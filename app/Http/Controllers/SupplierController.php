<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view("myApp.supplier",compact('suppliers' ));
    }

    public function add_supplier(Request $request){ //store
        try {
            $validated = $request->validate([
                'supplier_name' => 'required|string|max:100|unique:suppliers,supplier_name',
                'contact_info' => 'nullable|string|max:150',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            ]);

            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('suppliers', 'public'); // Save in 'storage/app/public/suppliers'
            }

            // Create supplier
            Supplier::create([
                'supplier_name' => $request->supplier_name,
                'contact_info' => $request->contact_info,
                'image' => $imagePath, // Save the image path in the database
            ]);
            // Supplier::create($validated); // we cant use this kay mu error, need usa usahon ug add 
        
            return redirect()->route('admin.supplierDashboard')->with('success', 'Supplier added successfully!');
       }catch(\Exception $e){
            return redirect()->route('admin.supplierDashboard')->with('error', 'Supplier already exist');
       }
    }

    public function update_supplier(Request $request, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
    
            // Validate inputs
            $request->validate([
                'supplier_name' => 'required|string|max:100|unique:suppliers,supplier_name,' . $supplier->id,
                'contact_info' => 'nullable|string|max:150',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Update other fields
            $supplier->supplier_name = $request->supplier_name;
            $supplier->contact_info = $request->contact_info;

            // Update Image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($supplier->image && Storage::exists('public/' . $supplier->image)) {
                    Storage::delete('public/' . $supplier->image);
                }
    
                // Store the new image
                $imagePath = $request->file('image')->store('suppliers', 'public');
                $supplier->image = $imagePath;
            }
            // dd($supplier);
            // Save changes
            $supplier->save();
    
            return redirect()->route('admin.supplierDashboard')->with('success', 'Supplier Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.supplierDashboard')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function delete_supplier(Request $request, $id){
        try {
            // Find the category
            $suppliers = Supplier::findOrFail($id);
            
            // Delete the category
            $suppliers->delete();
    
            // Redirect with a success message
            return redirect()->route('admin.supplierDashboard')->with('success', 'Supplier deleted successfully!');
        } catch (\Exception $e) {
            // Handle errors and redirect with an error message
            return redirect()->route('admin.supplierDashboard')->with('error', 'Forbidden to delete this supplier!');
        }
    }
    
}
