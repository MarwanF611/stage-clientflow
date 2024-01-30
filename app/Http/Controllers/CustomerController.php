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
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required',
            'telefoonnummer' => 'required',
            'straatnaam' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'land' => 'required',
            'bedrijfsnaam' => 'required',
            'btw_nummer' => 'required',
            'iban' => 'required',
        ]);

        try {
            $klant = new Klant();
            $klant->voornaam = $request->voornaam;
            $klant->achternaam = $request->achternaam;
            $klant->email = $request->email;
            $klant->telefoonnummer = $request->telefoonnummer;
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
