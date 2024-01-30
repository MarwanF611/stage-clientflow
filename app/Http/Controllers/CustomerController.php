<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Klant::simplePaginate(20);

        $customers->withPath('klanten');

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'street_name' => 'required',
            'house_number' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'company_name' => 'required',
            'vat_number' => 'required',
            'iban' => 'required',
        ]);

        try {
            $klant = new Klant();
            $klant->first_name = $request->voornaam;
            $klant->last_name = $request->achternaam;
            $klant->email = $request->email;
            $klant->phone_number = $request->telefoonnummer;
            $klant->straatnaam = $request->straatnaam;
            $klant->huisnummer = $request->huisnummer;
            $klant->postcode = $request->postcode;
            $klant->land = $request->land;
            $klant->bedrijfsnaam = $request->bedrijfsnaam;
            $klant->btw_nummer = $request->btw_nummer;
            $klant->iban = $request->iban;
            $klant->save();
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect()->route('customers.index')
            ->with('success', 'Klant is succesvol aangemaakt.');
    }
}
