<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductenController extends Controller
{
    public function index()
    {
        return view('producten.index');
    }

    public function create()
    {
        return view('producten.create');
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
