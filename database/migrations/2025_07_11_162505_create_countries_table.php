<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_code', 2)->unique(); // PL, US, GB
            $table->string('phone_code', 5); // +48, +1
            $table->string('currency_code', 3); // PLN, USD, EUR
            $table->string('currency_symbol', 10); // zł, $, €
            $table->string('timezone_default', 50); // Europe/Warsaw
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['iso_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
