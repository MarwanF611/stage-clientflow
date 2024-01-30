<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::simplePaginate(20);

        $invoices->withPath('invoices');

        return view('invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(
        Request $request
    ) {
        $request->validate([
            'customer' => 'required',
            'payment_method' => 'required',
            'product_id_0' => 'required',
            'product_amount_0' => 'required',
            'expiration_date' => 'required|date',
            'status' => 'required',
        ]);

        // Products are passed along as product_id_x and product_amount_x
        // So store them in an array

        $products = [];
        $i = 0;
        while ($request->has('product_id_' . $i)) {
            $products[] = [
                'id' => $request->input('product_id_' . $i),
                'amount' => $request->input('product_amount_' . $i),
            ];
            $i++;
        }

        $datetime = new \DateTime($request->input('expiration_date'));

        $invoice = Invoice::create([
            'customer_id' => $request->input('customer'),
            'payment_method' => $request->input('payment_method'),
            'products' => json_encode($products),
            'expiration_date' => $datetime->format('Y-m-d'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice created successfully.');
    }

    public function download(
        Request $request,
    ) {
        $invoice = Invoice::find($request->id);
        $products = json_decode($invoice->products);

        foreach ($products as $product) {
            $product->details = Product::find($product->id);
        }


        $pdf = Pdf::loadView('pdf.invoice', [
            'invoice' => $invoice,
            'products' => $products,
        ]);
        return $pdf->download(
            'invoice_R' . random_int(1000, 9999) . '.pdf'
        );
    }

    public function delete(
        Request $request,
    ) {
        $invoice = Invoice::find($request->id);
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully.');
    }
}
