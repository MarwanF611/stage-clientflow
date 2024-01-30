<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    use HasFactory;
    protected $table = 'klanten';

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'telefoonnummer',
        'straatnaam',
        'huisnummer',
        'postcode',
        'woonplaats',
        'land',
        'bedrijfsnaam',
        'btw_nummer',
        'iban',
    ];
}
