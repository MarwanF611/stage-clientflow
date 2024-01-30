<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quotes.index');
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store()
    {
        return redirect()->route('quotes.index');
    }

    public function generatePdf()
    {
        // $offerte = Offerte::find($id);


        $pdf = Pdf::loadView('pdf.offerte', []);
        return $pdf->download(
            'quote_R' . random_int(1000, 9999) . '.pdf'
        );
    }
}
