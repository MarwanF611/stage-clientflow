<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam'  => 'required',
            'type' => 'required',
            'prijs' => 'required',
            'voorraad' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success', 'product is succesvol aangemaakt.');
    }
}
