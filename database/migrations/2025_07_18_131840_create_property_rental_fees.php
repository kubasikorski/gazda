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
        Schema::create('property_rental_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_rental_fee_type_id')->constrained('property_rental_fee_types')->onDelete('cascade');
            $table->date('payment_date');
            $table->date('payment_due_date')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->enum('status', [
                'pending',    // oczekujące
                'paid',       // opłacone
                'overdue',    // przeterminowane
                'cancelled'   // anulowane
            ])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_rental_fees');
    }
};
