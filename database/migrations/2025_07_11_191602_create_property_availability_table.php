<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');

            $table->date('available_from');
            $table->date('available_to')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_availability');
    }
};
