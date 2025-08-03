<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            // Dane podstawowe
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->foreignId('city_id')->nullable()->constrained()->onDelete('set null');
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('id_number')->nullable(); // PESEL, SSN, etc.
            $table->enum('id_type', ['national_id', 'passport', 'driving_license', 'other'])->nullable();
            $table->string('id_issued_by')->nullable();
            $table->date('id_issued_date')->nullable();
            $table->date('id_expires_date')->nullable();

            $table->enum('employment_type', [
                'full_time', 'part_time', 'contract', 'self_employed',
                'unemployed', 'student', 'retired', 'other'
            ])->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relation')->nullable();

            $table->text('notes')->nullable();
            $table->json('preferences')->nullable(); // ['pets_allowed', 'smoking', etc.]

            $table->boolean('is_active')->default(true);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->foreignId('managed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
