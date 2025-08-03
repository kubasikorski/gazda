<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyRentalFeeTypesSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 1,
                'description' => 'Miesięczne odstępne za wynajem mieszkania',
            ],
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 2,
                'description' => 'Czynsz do wspólnoty mieszkaniowej',
            ],
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 3,
                'description' => 'Fundusz remontowy na przyszłe prace konserwacyjne',
            ],
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 4,
                'description' => 'Opłata za wodę zużytą w mieszkaniu',
            ],
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 6,
                'description' => 'Opłata za energię elektryczną zużytą w mieszkaniu',
            ],
            [
                'property_rental_agreement_id' => 1,
                'fee_type_id' => 7,
                'description' => 'Opłata za gaz zużyty w mieszkaniu',
            ],
        ];

        $now = Carbon::now();

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('property_rental_fee_types')->insert($items);
    }
}
