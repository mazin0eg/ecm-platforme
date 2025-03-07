<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    
    public function index()
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the data
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('public/products');

        // Create and save the product
        Product::create([
            'name'        => $validated['name'],
            'price'       => $validated['price'],
            'description' => $validated['description'],
            'image'       => basename($imagePath),
            'category'    => $request->input('category', 'Uncategorized'),
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

            public function edit(Product $product)
        {
            return view('edit-product', compact('product'));
        }

        public function destroy(Product $product)
        {
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        }

        public function show(Product $product)
        {
            return view('product-details', compact('product'));
        }

        public function home()
        {
            $products = Product::take(4)->get();
            return view('home', compact('products'));
        }
}