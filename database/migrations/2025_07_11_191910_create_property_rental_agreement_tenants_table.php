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
        Schema::create('property_rental_agreement_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_rental_agreement_id')->constrained()->onDelete('cascade')->index('pr_re_ag_te_agreement_id_fk');
            $table->foreignId('tenant_id')->constrained()->onDelete('restrict')->index('pr_re_ag_te_tenant_id_fk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_rental_agreement_tenants');
    }
};
