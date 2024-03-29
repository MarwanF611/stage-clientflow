<?php

namespace App\Http\Controllers;

use App\Mail\MailableInvoice;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::simplePaginate(20);

        foreach ($invoices as $invoice) {
            $invoicePrice = 0;
            $products = json_decode($invoice->products);
            $vat = 0;
            $total = 0;


            foreach ($products as $product) {
                $product->details = Product::find($product->id);

                $vat += $product->details->price * $product->amount * $invoice->vat_rate;
                $total += $product->details->price * $product->amount;

                $invoicePrice += $total + $vat;
            }


            $invoice->price = $invoicePrice;
        }




        $invoices->withPath('invoices');

        return view('invoices.index', [
            'invoices' => $invoices,

        ]);
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();



        if (count($customers) == 0) {
            return redirect()->route('invoices.index')
                ->with(
                    [
                        'error' => 'You need to create a customer first',
                        'route' => 'customers.create',
                    ]
                );
        }


        if (count($products) == 0) {
            return redirect()->route('invoices.index')
                ->with(
                    [
                        'error' => 'You need to create a product first',
                        'route' => 'products.create',
                    ]
                );
        }

        return view('invoices.create', [
            'customers' => $customers,
            'products' => $products,
        ]);
    }

    public function store(
        Request $request
    ) {
        $request->validate([
            'customer' => 'required',
            'payment_method' => 'required',
            'product_id_0' => 'required',
            'product_amount_0' => 'required',
            'expiration_date' => 'required|date_format:d/m/Y',
            'status' => 'required',
            'vat_rate' => 'required',
        ]);

        // If expiration date is in the past, return to form
        $datetime = \DateTime::createFromFormat('d/m/Y', $request->input('expiration_date'));
        if ($datetime < new \DateTime()) {
            return redirect()->route('invoices.create')
                ->withErrors([
                    'expiration_date' => 'Expiration date must be in the future',
                ]);
        }

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

        $invoice = Invoice::create([
            'customer_id' => $request->input('customer'),
            'payment_method' => $request->input('payment_method'),
            'products' => json_encode($products),
            'expiration_date' => $datetime->format('Y-m-d'),
            'status' => $request->input('status'),
            'vat_rate' => $request->input('vat_rate'),
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

    public function sendMail(
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

        $pdf->save(
            public_path('/storage/invoice_' . $invoice->id . '.pdf')
        )->stream(
            'invoice.pdf'
        );



        Mail::to('testreceiver@gmail.com')->send(new MailableInvoice(
            auth()->user()->name,
            $invoice,
            $products,
            public_path('/storage/invoice_' . $invoice->id . '.pdf')
        ));

        $invoice->is_sent = true;
        $invoice->save();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice sent successfully.');
    }


    public function delete(
        Request $request,
    ) {
        $invoice = Invoice::find($request->id);
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully.');
    }

    public function edit(
        Request $request,
        
    ) {
        $invoice = Invoice::find($request->id);
        $products = json_decode($invoice->products);
        $customers = Customer::all();


        foreach ($products as $product) {
            $product->details = Product::find($product->id);
        }

        return view('invoices.edit', [
            'invoice' => $invoice,
            'products' => $products,
            'customers' => $customers,
        ]);
    }

    public function update(
        Request $request,
    ) {
        $request->validate([
            'customer' => 'required',
            'payment_method' => 'required',
            'product_id_0' => 'required',
            'product_amount_0' => 'required',
            'expiration_date' => 'required|date_format:d/m/Y',
            'status' => 'required',
            'vat_rate' => 'required',
        ]);

        // If expiration date is in the past, return to form
        $datetime = \DateTime::createFromFormat('d/m/Y', $request->input('expiration_date'));
        if ($datetime < now()) {
            return redirect()->route('invoices.edit', [
                'id' => $request->id,
            ])->withErrors([
                'expiration_date' => 'Expiration date must be in the future',
            ]);
        }

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

        $invoice = Invoice::find($request->id);

        $invoice->customer_id = $request->input('customer');
        $invoice->payment_method = $request->input('payment_method');
        $invoice->products = json_encode($products);
        $invoice->expiration_date = $datetime->format('Y-m-d');
        $invoice->status = $request->input('status');
        $invoice->vat_rate = $request->input('vat_rate');
        $invoice->save();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully.');
    }
}
