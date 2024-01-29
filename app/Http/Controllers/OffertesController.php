<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffertesController extends Controller
{
    public function index()
    {
        return view('offertes.index');
    }
}
