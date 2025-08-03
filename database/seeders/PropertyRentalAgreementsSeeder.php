<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyRentalAgreementsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'property_id' => 1,
                'start_date' => '2023-01-01',
                'notice_period_days' => '30',
                'payment_day' => 15,
                'deposit_amount' => 1500.00,
                'deposit_currency' => 'PLN',
                'deposit_paid' => true,
                'deposit_paid_date' => '2023-01-01',
                'status' => 'active',
                'contract_file' => '',
                'contract_signed_date' => '2023-01-01',
                'move_in_date' => '2023-01-01',
                'created_by' => 1,
            ],
        ];

        $now = Carbon::now();

        foreach ($items as &$item) {
            $item['uuid'] = Str::uuid()->toString();
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('property_rental_agreements')->insert($items);
    }
}
