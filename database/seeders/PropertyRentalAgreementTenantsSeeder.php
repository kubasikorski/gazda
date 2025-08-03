<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyRentalAgreementTenantsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'property_rental_agreement_id' => 1,
                'tenant_id' => 1,
            ],
        ];

        $now = Carbon::now();

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('property_rental_agreement_tenants')->insert($items);
    }
}
