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
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
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
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
