<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturenController extends Controller
{
    public function index()
    {
        return view('facturen.index');
    }
}
