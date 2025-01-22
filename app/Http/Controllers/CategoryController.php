<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => Category::all()
        ];

        return view('admin.category.index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Create Categories',
        ];
        return view('admin.category.create', $data);
    }
    public function edit(Category $category)
    {

        $data = [
            'title' => 'Edit Categories',
            'category' => $category
        ];
        return view('admin.category.edit', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:categories,code',
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($validatedData);
        return redirect('/category')->with('info', 'Category created successfully!');
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'code' => 'required|unique:categories,code,' . $id,
            'name' => 'required|unique:categories,name,' . $id,
        ]);


        $category = Category::find($id);
        $category->update($validatedData);
        return redirect('/category')->with('info', 'Category updated successfully!');
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect('/category')->with('info', 'Category deleted successfully!');
    }
}
