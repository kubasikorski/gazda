<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');

            $table->date('valid_from');
            $table->date('valid_to')->nullable();

            $table->enum('rental_type', [
                'long_term', 'short_term', 'daily', 'weekly',
                'monthly', 'seasonal', 'corporate'
            ]);

            $table->decimal('base_price', 10, 2);
            $table->string('currency', 3);
            $table->enum('price_period', ['day', 'week', 'month', 'year']);

            $table->unsignedInteger('min_stay_days')->nullable();
            $table->unsignedInteger('max_stay_days')->nullable();

            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->timestamps();

            $table->unique(['property_id', 'rental_type', 'valid_from'],
                'unique_pricing_period');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_pricing');
    }
};
