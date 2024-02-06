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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('expiration_date');
            $table->enum('payment_method', ['cash', 'bank', 'card', 'credit_card']);
            $table->enum('status', ['open', 'expired', 'completed']);
            $table->json('products');
            $table->decimal('vat_rate', 5, 2)->default(0); // 0.12 of 0.21 of 0.06
            $table->foreignId('customer_id');
            $table->timestamps();
            $table->index('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
