<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyRentalFeesSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $items = [
            [
                'property_rental_fee_type_id' => 1,
                'payment_date' => '2025-07-15',
                'payment_due_date' => '2025-07-20',
                'amount' => 2200.00,
                'currency' => 'PLN',
                'status' => 'pending',
            ],
            [
                'property_rental_fee_type_id' => 2,
                'payment_date' => '2025-07-15',
                'payment_due_date' => '2025-07-20',
                'amount' => 540.00,
                'currency' => 'PLN',
                'status' => 'pending',
            ],
            [
                'property_rental_fee_type_id' => 3,
                'payment_date' => '2025-07-15',
                'payment_due_date' => '2025-07-20',
                'amount' => 60.00,
                'currency' => 'PLN',
                'status' => 'pending',
            ],
        ];



        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('property_rental_fees')->insert($items);
    }
}
