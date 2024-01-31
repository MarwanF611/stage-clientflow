<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::simplePaginate(20);

        $quotes->withPath('quotes');

        return view('quotes.index', [
            'quotes' => $quotes,
        ]);
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(
        Request $request
    ) {
        $request->validate([
            'customer' => 'required',
            'product_id_0' => 'required',
            'product_amount_0' => 'required',
        ]);

        $products = [];
        $i = 0;
        while ($request->has('product_id_' . $i)) {
            $products[] = [
                'id' => $request->input('product_id_' . $i),
                'amount' => $request->input('product_amount_' . $i),
            ];
            $i++;
        }

        Quote::create([
            'customer_id' => $request->input('customer'),
            'products' => json_encode($products),
        ]);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice created successfully.');
    }


    public function download(
        Request $request,
    ) {
        $quote = Quote::find($request->id);
        $products = json_decode($quote->products);

        foreach ($products as $product) {
            $product->details = Quote::find($product->id);
        }

        $pdf = Pdf::loadView('pdf.quote', [
            'quote' => $quote,
            'products' => $products,
        ]);
        return $pdf->download(
            'quote_R' . random_int(1000, 9999) . '.pdf'
        );
    }

    public function delete(
        Request $request,
    ) {
        $quote = Quote::find($request->id);
        $quote->delete();

        return redirect()->route('quotes.index')
            ->with('success', 'Invoice deleted successfully.');
    }
}
