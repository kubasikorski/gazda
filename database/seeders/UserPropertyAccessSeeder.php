<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserPropertyAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dostępy użytkowników do nieruchomości - wprowadź swoje dane
        $accesses = [
            [
                'user_id' => 1,
                'property_id' => 1,
                'access_type' => 'property_manager',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Zarządca nieruchomości',
                'granted_by' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 1,
                'access_type' => 'owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Główny właściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 1,
                'property_id' => 2,
                'access_type' => 'owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Główny właściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
                'access_type' => 'co_owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Współwłaściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 1,
                'property_id' => 3,
                'access_type' => 'owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Główny właściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 3,
                'access_type' => 'co_owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Współwłaściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 1,
                'property_id' => 4,
                'access_type' => 'owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Główny właściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 4,
                'access_type' => 'co_owner',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Współwłaściciel mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 3,
                'property_id' => 1,
                'access_type' => 'tenant',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Najemca mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 4,
                'property_id' => 2,
                'access_type' => 'tenant',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Najemca mieszkania',
                'granted_by' => 1,
            ],
            [
                'user_id' => 5,
                'property_id' => 2,
                'access_type' => 'tenant',
                'valid_from' => '2024-01-01',
                'valid_to' => null,
                'is_active' => true,
                'notes' => 'Najemca mieszkania',
                'granted_by' => 1,
            ],

        ];

        $now = Carbon::now();

        // Dodaj timestamp dla wszystkich rekordów
        foreach ($accesses as &$access) {
            $access['granted_at'] = $now;
            $access['created_at'] = $now;
            $access['updated_at'] = $now;
        }

        // Wstaw dane do bazy
        DB::table('user_property_access')->insert($accesses);

        $this->command->info('Dodano ' . count($accesses) . ' dostępów do nieruchomości.');
    }
}
