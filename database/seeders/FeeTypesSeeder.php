<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FeeTypesSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Odstępne',
            ],
            [
                'name' => 'Czynsz administracyjny',
            ],
            [
                'name' => 'Fundusz remontowy',
            ],
            [
                'name' => 'Opłata za wodę',
            ],
            [
                'name' => 'Opłata za śmieci',
            ],
            [
                'name' => 'Opłata za energię elektryczną',
            ],
            [
                'name' => 'Opłata za gaz',
            ],
            [
                'name' => 'Opłata za ogrzewanie',
            ],
            [
                'name' => 'Inne opłaty',
            ],
        ];

        $now = Carbon::now();

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('fee_types')->insert($items);
    }
}
