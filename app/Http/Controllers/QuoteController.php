<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quote;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
        $customers = Customer::all();
        $products = Product::all();

        if (count($customers) == 0) {
            return redirect()->route('quotes.index')
                ->with(
                    [
                        'error' => 'You need to create a customer first',
                        'route' => 'customers.create',
                    ]
                );
        }


        if (count($products) == 0) {
            return redirect()->route('quotes.index')
                ->with(
                    [
                        'error' => 'You need to create a product first',
                        'route' => 'products.create',
                    ]
                );
        }

        return view('quotes.create', [
            'customers' => $customers,
            'products' => $products,
        ]);
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

        return redirect()->route('quotes.index')
            ->with('success', 'Quote created successfully.');
    }


    public function download(
        Request $request,
    ) {
        $quote = Quote::find($request->id);
        $products = json_decode($quote->products);

        foreach ($products as $product) {
            $product->details = Product::find($product->id);
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

    public function edit(
        Request $request,

    ) {
        $quote = Quote::find($request->id);
        $products = Product::all();
        $customers = Customer::all();

        return view('quotes.edit', [
            'quote' => $quote,
            'products' => $products,
            'customers' => $customers,
        ]);
    }

    public function update(
        Request $request,
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


        $quote = Quote::find($request->id);

        if (!$quote) {
            dd('Quote not found');
        }

        // Assuming customer is required for a quote
        if (!$request->has('customer')) {
            dd('Customer not found');
        }


        $quote->customer_id = $request->input('customer');
        $quote->products = json_encode($products);
        $quote->save();

        return redirect()->route('quotes.index')
            ->with('success', 'Quote updated successfully.');
    }
}
