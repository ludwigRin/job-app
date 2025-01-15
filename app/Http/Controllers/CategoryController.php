<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // validates the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // creates a new category with the validated data
        Category::create($validatedData);

        // returns user back to category list
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // displays the details of a specific category
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // returns a view to edit a category
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // validates the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // updates the selected category with the validated data
        $category->update($validatedData);
        
        // redirects the user to the category list
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // deletes the category
        $category->delete();

        // redirects the user to category list
        return redirect()->route('categories.index');
    }
}
