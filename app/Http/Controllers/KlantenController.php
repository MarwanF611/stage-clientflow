<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantenController extends Controller
{
    public function index()
    {
        return view('klanten.index');
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
            'woonplaats' => 'required',
            'land' => 'required',
            'bedrijfsnaam' => 'required',
            'btw_nummer' => 'required',
            'iban' => 'required',
        ]);

        Klant::create($request->all());

        return redirect()->route('klanten.index')
            ->with('success', 'Klant is succesvol aangemaakt.');
    }
}
