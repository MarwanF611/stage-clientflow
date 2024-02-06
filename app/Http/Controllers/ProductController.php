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

        $new_filename = null;

        // Validate request
        $request->validate([
            'name'  => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:9999',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //image is not required
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        if ($request->hasFile('image')) {
            // Get image file
            $image = $request->file('image');
            $new_filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

            // Store image file on disk
            $image->storeAs('public/images', $new_filename);
        }

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

    public function delete(Request $request)
    {
        $product = Product::find($request->get('id'));
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'product is succesvol verwijderd.');
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->get('id'));

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request)
    {
        $rules = $request->validate([
            'name'  => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:9999',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Get image file
            $image = $request->file('image');
            $new_filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

            // Store image file on disk
            $image->storeAs('public/images', $new_filename);
        }

        $product = Product::find($request->get('id'));

        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->hasFile('image')) {
            $product->image = $new_filename;
        }

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'product is succesvol aangepast.');
    }
}
