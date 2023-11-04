<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Ticket;


class AdminCategoryController extends Controller
{
    public function index(){
    $categories = Category::all(); // Retrieve the categories from your database

    return view('admin.categories.index', [
        'categories' => $categories,
    ]);
}
    public function create(Category $category){


    return view('admin.categories.create');

}
public function store(Request $request)
{
    $attributes = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        
    ]);

    Category::create($attributes);

    return redirect('/');
}
public function edit(Category $category)
{
    return view('admin.categories.edit', compact('category'));
}

   
public function update(Request $request, Category $category)
{

    $attributes = $request->validate([
         'name' => 'required',
        'slug' => 'required',
    ]);

    
    $category->update($attributes);

   return redirect()->route('admin.categories.index')->with('success', 'Category has been updated');
}

 public function destroy(Category $category){

    $category->delete();
 return redirect()->route('admin.categories.index')->with('success', 'Category has been updated');
}
 
}

