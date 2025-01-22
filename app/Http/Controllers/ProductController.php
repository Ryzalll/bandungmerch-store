<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Products',
            'products' => Product::where('stock', '>=', 1)->get(),[]
        ];
        return view('admin.products.index',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Product',
            'categories' => Category::all(),
        ];
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoName = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('products', $photoName);

            $validatedData['photo'] = $photoName;
        }

        Product::create($validatedData);

        return redirect('/product')->with('info', 'Product created successfully!');
    }

    public function edit(Product $product)
    {

        $data = [
            'title' => 'Edit Products',
            'product' => $product,
            'categories' => Category::all(),
        ];
        return view('admin.products.edit', $data);
    }

    public function update(Request $request): RedirectResponse
{
    $id = $request->id;

    $validatedData = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('assets/products', 'public');
        $validatedData['photo'] = $photoPath;
    }

    $product->update($validatedData);

    return redirect('/product')->with('info', 'Product updated successfully!');
}


    public function delete(Product $product): RedirectResponse{
        $product->delete();
        return redirect('/product')->with('info', 'Product deleted successfully!');
    }

    public function getProduct(Product $product)
    {
        return response()->json($product);
    }

}
