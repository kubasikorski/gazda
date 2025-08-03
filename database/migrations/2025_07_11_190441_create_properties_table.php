<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->foreignId('city_id')->constrained('cities')->onDelete('restrict');

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('postal_code', 20);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->enum('property_type', [
                'apartment', 'house', 'studio', 'room',
                'commercial', 'office', 'warehouse', 'other'
            ]);
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->unsignedTinyInteger('bathrooms')->nullable();
            $table->decimal('area', 8, 2)->nullable();
            $table->enum('area_unit', ['sqm', 'sqft'])->default('sqm');
            $table->unsignedTinyInteger('floor')->nullable();
            $table->unsignedTinyInteger('total_floors')->nullable();

            $table->enum('furnishing_status', [
                'unfurnished', 'semi_furnished', 'fully_furnished'
            ])->default('unfurnished');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');

            $table->boolean('is_available')->default(true);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
