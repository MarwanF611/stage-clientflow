<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::simplePaginate(20);

        $customers->withPath('customers');

        return view('customers.index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'vat_number' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
        ]);

        try {
            $klant = new Customer();
            $klant->first_name = $request->first_name;
            $klant->last_name = $request->last_name;
            $klant->email = $request->email;
            $klant->phone_number = $request->phone_number;
            $klant->street_name = $request->street_name;
            $klant->house_number = $request->house_number;
            $klant->postcode = $request->postcode;
            $klant->country = $request->country;
            $klant->company_name = $request->company_name;
            $klant->vat_number = $request->vat_number;
            $klant->iban = $request->iban;
            $klant->save();
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect()->route('customers.index')
            ->with('success', 'Klant is succesvol aangemaakt.');
    }

    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        $customer->trashed();


        return redirect()->route('customers.index')
            ->with('success', 'Klant is succesvol verwijderd.');
    }

    public function edit(Request $request)
    {
        $customer = Customer::find($request->id);

        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'vat_number' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
        ]);

        try {
            $klant = Customer::find($request->id);
            $klant->first_name = $request->first_name;
            $klant->last_name = $request->last_name;
            $klant->email = $request->email;
            $klant->phone_number = $request->phone_number;
            $klant->street_name = $request->street_name;
            $klant->house_number = $request->house_number;
            $klant->postcode = $request->postcode;
            $klant->country = $request->country;
            $klant->company_name = $request->company_name;
            $klant->vat_number = $request->vat_number;
            $klant->iban = $request->iban;
            $klant->save();
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect()->route('customers.index')
            ->with('success', 'Klant is succesvol aangepast.');
    }
}
