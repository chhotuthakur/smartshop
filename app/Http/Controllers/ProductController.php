<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.product-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'details' => 'nullable|string',
            'category' => 'required|string', 
            'sub_category' => 'nullable|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $fileName);
            $imagePath = 'img/' . $fileName;
        }
    
        // Create a new product instance
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'rating' => $request->input('rating'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'details' => $request->input('details'),
            'category' => $request->input('category'),
            'sub_category' => $request->input('sub_category'),
            'product_image' => $imagePath ?? null, // If no image uploaded, set to null
        ]);
    
        // Save the product
        $product->save();
    
        return redirect()->back()->with('success', 'Product created successfully.');
    }
    

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'details' => 'nullable|string',
            'category' => 'required|string',
            'sub_category' => 'nullable|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $fileName);
            $imagePath = 'img/' . $fileName;
        }

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function shops()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }
}
