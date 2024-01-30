<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
// Import UUID
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplePaginate(20);

        $products->withPath('products');

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:9999',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get image file
        $image = $request->file('image');
        $new_filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

        // Store image file on disk
        $image->storeAs('public/images', $new_filename);

        // Create product
        $product = new Product([
            'name'  => $request->get('name'),
            'type' => $request->get('type'),
            'price' => $request->get('price'),
            'stock' => $request->get('stock'),
            'image' => $new_filename,
        ]);


        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'product is succesvol aangemaakt.');
    }

  
}
