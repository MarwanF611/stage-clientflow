<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantenController extends Controller
{
    public function index()
    {
        $klanten = Klant::simplePaginate(20);

        $klanten->withPath('klanten');

        return view('klanten.index', [
            'klanten' => $klanten,
        ]);
    }

    public function create()
    {
        return view('klanten.create');
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

        return redirect()->route('klanten.index')
            ->with('success', 'Klant is succesvol aangemaakt.');
    }
}
