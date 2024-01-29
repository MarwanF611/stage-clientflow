<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offertes', function (Blueprint $table) {
            $table->id();
            $table->date('vervaldatum');
            $table->enum('betalings_methode', ['contant', 'bank', 'pin', 'creditcard']);
            $table->enum('status', ['open', 'verlopen', 'afgerond']);
            $table->json('producten');
            /*
            [
                {
                    "id": 1,
                    "aantal": 2
                },
                {
                    "id": 2,
                    "aantal": 1
                }
            ]
            */
            $table->foreignId('klant_id')->constrained();
            $table->timestamps();


            $table->index('klant_id');
            $table->foreign('klant_id')
                ->references('id')
                ->on('klanten')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offertes');
    }
};
