<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Polska',
                'iso_code' => 'PL',
                'phone_code' => '48',
                'currency_code' => 'PLN',
                'currency_symbol' => 'zł',
                'timezone_default' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'name' => 'Niemcy',
                'iso_code' => 'DE',
                'phone_code' => '49',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Berlin',
                'is_active' => true,
            ],
            [
                'name' => 'Francja',
                'iso_code' => 'FR',
                'phone_code' => '33',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Paris',
                'is_active' => true,
            ],
            [
                'name' => 'Wielka Brytania',
                'iso_code' => 'GB',
                'phone_code' => '44',
                'currency_code' => 'GBP',
                'currency_symbol' => '£',
                'timezone_default' => 'Europe/London',
                'is_active' => true,
            ],
            [
                'name' => 'Hiszpania',
                'iso_code' => 'ES',
                'phone_code' => '34',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Madrid',
                'is_active' => true,
            ],
            [
                'name' => 'Włochy',
                'iso_code' => 'IT',
                'phone_code' => '39',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Rome',
                'is_active' => true,
            ],
            [
                'name' => 'Holandia',
                'iso_code' => 'NL',
                'phone_code' => '31',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Amsterdam',
                'is_active' => true,
            ],
            [
                'name' => 'Belgia',
                'iso_code' => 'BE',
                'phone_code' => '32',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Brussels',
                'is_active' => true,
            ],
            [
                'name' => 'Szwajcaria',
                'iso_code' => 'CH',
                'phone_code' => '41',
                'currency_code' => 'CHF',
                'currency_symbol' => 'CHF',
                'timezone_default' => 'Europe/Zurich',
                'is_active' => true,
            ],
            [
                'name' => 'Austria',
                'iso_code' => 'AT',
                'phone_code' => '43',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Vienna',
                'is_active' => true,
            ],
            [
                'name' => 'Portugalia',
                'iso_code' => 'PT',
                'phone_code' => '351',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Lisbon',
                'is_active' => true,
            ],
            [
                'name' => 'Czechy',
                'iso_code' => 'CZ',
                'phone_code' => '420',
                'currency_code' => 'CZK',
                'currency_symbol' => 'Kč',
                'timezone_default' => 'Europe/Prague',
                'is_active' => true,
            ],
            [
                'name' => 'Szwecja',
                'iso_code' => 'SE',
                'phone_code' => '46',
                'currency_code' => 'SEK',
                'currency_symbol' => 'kr',
                'timezone_default' => 'Europe/Stockholm',
                'is_active' => true,
            ],
            [
                'name' => 'Norwegia',
                'iso_code' => 'NO',
                'phone_code' => '47',
                'currency_code' => 'NOK',
                'currency_symbol' => 'kr',
                'timezone_default' => 'Europe/Oslo',
                'is_active' => true,
            ],
            [
                'name' => 'Dania',
                'iso_code' => 'DK',
                'phone_code' => '45',
                'currency_code' => 'DKK',
                'currency_symbol' => 'kr',
                'timezone_default' => 'Europe/Copenhagen',
                'is_active' => true,
            ],
            [
                'name' => 'Finlandia',
                'iso_code' => 'FI',
                'phone_code' => '358',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Helsinki',
                'is_active' => true,
            ],
            [
                'name' => 'Irlandia',
                'iso_code' => 'IE',
                'phone_code' => '353',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Dublin',
                'is_active' => true,
            ],
            [
                'name' => 'Grecja',
                'iso_code' => 'GR',
                'phone_code' => '30',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'timezone_default' => 'Europe/Athens',
                'is_active' => true,
            ],
        ];

        // Dodaj timestamp dla wszystkich rekordów
        $now = Carbon::now();
        foreach ($countries as &$country) {
            $country['created_at'] = $now;
            $country['updated_at'] = $now;
        }

        // Wstaw dane do bazy (batch insert dla lepszej wydajności)
        DB::table('countries')->insert($countries);

        $this->command->info('Dodano ' . count($countries) . ' krajów europejskich.');
    }
}
