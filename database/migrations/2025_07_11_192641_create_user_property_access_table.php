<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_property_access', function (Blueprint $table) {
            $table->id();

            // Relacje podstawowe
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            // Typ dostępu
            $table->enum('access_type', [
                'owner',                // właściciel
                'co_owner',            // współwłaściciel
                'property_manager',    // zarządca nieruchomości
                'rental_agent',        // agent wynajmu
                'maintenance_manager', // zarządca utrzymania
                'financial_manager',   // zarządca finansowy
                'assistant',           // asystent
                'viewer',              // tylko podgląd
                'tenant'               // najemca (ma dostęp do swojej nieruchomości)
            ]);

            $table->date('valid_from')->default(now());
            $table->date('valid_to')->nullable();

            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();

            $table->foreignId('granted_by')->constrained('users')->onDelete('restrict');
            $table->timestamp('granted_at')->default(now());

            $table->timestamps();

            // Unikalność aktywnego dostępu tego samego typu
            $table->unique(['user_id', 'property_id', 'access_type', 'valid_from'],
                'unique_user_property_access');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_property_access');
    }
};
