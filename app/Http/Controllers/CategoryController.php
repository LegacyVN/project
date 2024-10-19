<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller {

     
     
     /// CATEGORY
     public function index()
     {
         $categories = Categories::get();
         return view('admin.categories.index', compact('categories'));
     }
 
     // ADD CATEGORY
     public function add(Request $request)
     {
         $request->validate([
             'category_name' => 'required|max:255',
         ]);
         Categories::create([
             'cat_name' => $request->category_name,
         ]);
 
         return redirect()->back()->with('success', 'Category created successfully.');
     }
 
     // Show Option 
     public function edit($id)
     {
         $category = Categories::find($id);
         return view('admin.categories.edit', compact('category'));
     }
 
     // Update Category
     public function update(Request $request, $id)
     {
         $request->validate([
             'category_name' => 'required|max:255',
         ]);
 
         $category = Categories::find($id);
         $category->update([
             'cat_name' => $request->category_name,
         ]);
 
         return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
     }
 
     // Del Categories
     public function destroy($id)
     {
         $category = Categories::find($id);
         $category->delete();
 
         return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
     } 
}