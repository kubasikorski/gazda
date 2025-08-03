<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_rental_agreements', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            // Relacje podstawowe
            $table->foreignId('property_id')->constrained()->onDelete('restrict');

            // Okres najmu
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('notice_date')->nullable();
            $table->unsignedInteger('notice_period_days')->default(30);

            $table->unsignedTinyInteger('payment_day')->default(1);
            $table->decimal('deposit_amount', 10, 2);
            $table->string('deposit_currency', 3);
            $table->boolean('deposit_paid')->default(false);
            $table->date('deposit_paid_date')->nullable();

            $table->decimal('parking_fee', 10, 2)->nullable();
            $table->decimal('other_fees', 10, 2)->nullable();
            $table->text('other_fees_description')->nullable();

            // Status najmu
            $table->enum('status', [
                'draft',           // projekt umowy
                'pending',         // oczekuje na podpis
                'active',          // aktywny najem
                'notice_given',    // złożono wypowiedzenie
                'expired',         // zakończony naturalnie
                'terminated',      // rozwiązany przedwcześnie
                'suspended'        // zawieszony
            ])->default('draft');

            // Dokumenty i warunki
            $table->string('contract_file')->nullable();
            $table->text('special_conditions')->nullable();
            $table->boolean('pets_allowed')->default(false);
            $table->boolean('smoking_allowed')->default(false);
            $table->boolean('subletting_allowed')->default(false);

            $table->string('move_in_inventory_file')->nullable();
            $table->string('move_out_inventory_file')->nullable();
            $table->text('property_condition_notes')->nullable();

            $table->date('contract_signed_date')->nullable();
            $table->date('move_in_date')->nullable();
            $table->date('move_out_date')->nullable();
            $table->date('actual_move_out_date')->nullable();

            $table->text('notes')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_rental_agreements');
    }
};
