<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FacturenController extends Controller
{
    public function index()
    {
        return view('facturen.index');
    }

    public function generatePdf()
    {
        // $factuur = Factuur::find($id);


        $pdf = Pdf::loadView('pdf.factuur', []);
        return $pdf->download(
            'invoice_R' . random_int(1000, 9999) . '.pdf'
        );
    }
}