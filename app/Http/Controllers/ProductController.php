<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required',
        ]);

        dd($request->all());

        return redirect()->route('product.index')
            ->with('success', 'product is succesvol aangemaakt.');
    }
}
