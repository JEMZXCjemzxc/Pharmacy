<?php

namespace App\Http\Controllers;
use \App\Models\Category;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   

   public function show_category_dashboard(Request $request){
        $categories = Category::paginate(4);
        $medicines = Medicine::all();
        $query = null;
        return view("myApp.category",compact("categories" , "medicines" ,'query'));
   }

    // Create a new category
    public function add_category(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_name' => 'required|string|max:100|unique:categories,category_name',
                'description' => 'nullable|string',
            ]);
             Category::create($validated); // create all and store to databasez
             return redirect()->route('admin.categoryDashboard')->with('success', 'Category added successfully!');
        
        }catch(\Exception $e){
            return redirect()->route('admin.categoryDashboard')->with('error', 'category existed!');
        }       
    }

    public function update_category(Request $request,$id)
    {
        $categories = Category::findOrFail($id);
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        // dd($categories->update($request->all()));
        $categories->update($request->all());
        return redirect()->route('admin.categoryDashboard')->with('success', 'Category Updated Successfully!');
    }


    public function delete_category(Request $request,$id)
    {
        try {
            // Find the category
            $category = Category::findOrFail($id);
            
            // Delete the category
            $category->delete();
    
            // Redirect with a success message
            return redirect()->route('admin.categoryDashboard')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            // Handle errors and redirect with an error message
            return redirect()->route('admin.categoryDashboard')->with('error', 'Failed to delete the category. 
           delete some medicine to delete this category');
        }
    }
    public function searchCategory(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request

        // Fetch all categories or search by name/description based on query
        $categories = Category::when($query, function ($q) use ($query) {
            return $q->where('category_name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
        })->paginate(4); // Paginate the results

        // Return the results to the view
        return view('myApp.category', compact('categories', 'query'));
    }

    
}
                                                                        