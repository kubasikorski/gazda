<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pobierz ID krajów z bazy danych
        $countries = DB::table('countries')->pluck('id', 'iso_code');

        $cities = [
            // POLSKA - wszystkie duże miasta
            [
                'country_id' => $countries['PL'],
                'name' => 'Warszawa',
                'province' => 'Mazowieckie',
                'postal_code' => '00-001',
                'latitude' => 52.2297,
                'longitude' => 21.0122,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Kraków',
                'province' => 'Małopolskie',
                'postal_code' => '30-001',
                'latitude' => 50.0647,
                'longitude' => 19.9450,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Wrocław',
                'province' => 'Dolnośląskie',
                'postal_code' => '50-001',
                'latitude' => 51.1079,
                'longitude' => 17.0385,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Gdańsk',
                'province' => 'Pomorskie',
                'postal_code' => '80-001',
                'latitude' => 54.3520,
                'longitude' => 18.6466,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Poznań',
                'province' => 'Wielkopolskie',
                'postal_code' => '60-001',
                'latitude' => 52.4064,
                'longitude' => 16.9252,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Łódź',
                'province' => 'Łódzkie',
                'postal_code' => '90-001',
                'latitude' => 51.7592,
                'longitude' => 19.4560,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Szczecin',
                'province' => 'Zachodniopomorskie',
                'postal_code' => '70-001',
                'latitude' => 53.4285,
                'longitude' => 14.5528,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Katowice',
                'province' => 'Śląskie',
                'postal_code' => '40-001',
                'latitude' => 50.2649,
                'longitude' => 19.0238,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Lublin',
                'province' => 'Lubelskie',
                'postal_code' => '20-001',
                'latitude' => 51.2465,
                'longitude' => 22.5684,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Białystok',
                'province' => 'Podlaskie',
                'postal_code' => '15-001',
                'latitude' => 53.1325,
                'longitude' => 23.1688,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Gdynia',
                'province' => 'Pomorskie',
                'postal_code' => '81-001',
                'latitude' => 54.5189,
                'longitude' => 18.5305,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Częstochowa',
                'province' => 'Śląskie',
                'postal_code' => '42-200',
                'latitude' => 50.7971,
                'longitude' => 19.1200,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Radom',
                'province' => 'Mazowieckie',
                'postal_code' => '26-600',
                'latitude' => 51.4027,
                'longitude' => 21.1471,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Toruń',
                'province' => 'Kujawsko-Pomorskie',
                'postal_code' => '87-100',
                'latitude' => 53.0138,
                'longitude' => 18.5984,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['PL'],
                'name' => 'Rzeszów',
                'province' => 'Podkarpackie',
                'postal_code' => '35-001',
                'latitude' => 50.0412,
                'longitude' => 21.9991,
                'timezone' => 'Europe/Warsaw',
                'is_active' => true,
            ],

            // NIEMCY
            [
                'country_id' => $countries['DE'],
                'name' => 'Berlin',
                'province' => 'Berlin',
                'postal_code' => '10115',
                'latitude' => 52.5200,
                'longitude' => 13.4050,
                'timezone' => 'Europe/Berlin',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['DE'],
                'name' => 'Hamburg',
                'province' => 'Hamburg',
                'postal_code' => '20095',
                'latitude' => 53.5511,
                'longitude' => 9.9937,
                'timezone' => 'Europe/Berlin',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['DE'],
                'name' => 'München',
                'province' => 'Bayern',
                'postal_code' => '80331',
                'latitude' => 48.1351,
                'longitude' => 11.5820,
                'timezone' => 'Europe/Berlin',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['DE'],
                'name' => 'Frankfurt am Main',
                'province' => 'Hessen',
                'postal_code' => '60311',
                'latitude' => 50.1109,
                'longitude' => 8.6821,
                'timezone' => 'Europe/Berlin',
                'is_active' => true,
            ],

            // FRANCJA
            [
                'country_id' => $countries['FR'],
                'name' => 'Paris',
                'province' => 'Île-de-France',
                'postal_code' => '75001',
                'latitude' => 48.8566,
                'longitude' => 2.3522,
                'timezone' => 'Europe/Paris',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['FR'],
                'name' => 'Lyon',
                'province' => 'Auvergne-Rhône-Alpes',
                'postal_code' => '69001',
                'latitude' => 45.7640,
                'longitude' => 4.8357,
                'timezone' => 'Europe/Paris',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['FR'],
                'name' => 'Marseille',
                'province' => 'Provence-Alpes-Côte d\'Azur',
                'postal_code' => '13001',
                'latitude' => 43.2965,
                'longitude' => 5.3698,
                'timezone' => 'Europe/Paris',
                'is_active' => true,
            ],

            // WIELKA BRYTANIA
            [
                'country_id' => $countries['GB'],
                'name' => 'London',
                'province' => 'England',
                'postal_code' => 'SW1A 1AA',
                'latitude' => 51.5074,
                'longitude' => -0.1278,
                'timezone' => 'Europe/London',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['GB'],
                'name' => 'Manchester',
                'province' => 'England',
                'postal_code' => 'M1 1AA',
                'latitude' => 53.4808,
                'longitude' => -2.2426,
                'timezone' => 'Europe/London',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['GB'],
                'name' => 'Edinburgh',
                'province' => 'Scotland',
                'postal_code' => 'EH1 1YZ',
                'latitude' => 55.9533,
                'longitude' => -3.1883,
                'timezone' => 'Europe/London',
                'is_active' => true,
            ],

            // HISZPANIA
            [
                'country_id' => $countries['ES'],
                'name' => 'Madrid',
                'province' => 'Comunidad de Madrid',
                'postal_code' => '28001',
                'latitude' => 40.4168,
                'longitude' => -3.7038,
                'timezone' => 'Europe/Madrid',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['ES'],
                'name' => 'Barcelona',
                'province' => 'Cataluña',
                'postal_code' => '08001',
                'latitude' => 41.3851,
                'longitude' => 2.1734,
                'timezone' => 'Europe/Madrid',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['ES'],
                'name' => 'Valencia',
                'province' => 'Comunidad Valenciana',
                'postal_code' => '46001',
                'latitude' => 39.4699,
                'longitude' => -0.3763,
                'timezone' => 'Europe/Madrid',
                'is_active' => true,
            ],

            // WŁOCHY
            [
                'country_id' => $countries['IT'],
                'name' => 'Roma',
                'province' => 'Lazio',
                'postal_code' => '00118',
                'latitude' => 41.9028,
                'longitude' => 12.4964,
                'timezone' => 'Europe/Rome',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['IT'],
                'name' => 'Milano',
                'province' => 'Lombardia',
                'postal_code' => '20121',
                'latitude' => 45.4642,
                'longitude' => 9.1900,
                'timezone' => 'Europe/Rome',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['IT'],
                'name' => 'Napoli',
                'province' => 'Campania',
                'postal_code' => '80121',
                'latitude' => 40.8518,
                'longitude' => 14.2681,
                'timezone' => 'Europe/Rome',
                'is_active' => true,
            ],

            // HOLANDIA
            [
                'country_id' => $countries['NL'],
                'name' => 'Amsterdam',
                'province' => 'Noord-Holland',
                'postal_code' => '1012',
                'latitude' => 52.3676,
                'longitude' => 4.9041,
                'timezone' => 'Europe/Amsterdam',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['NL'],
                'name' => 'Rotterdam',
                'province' => 'Zuid-Holland',
                'postal_code' => '3011',
                'latitude' => 51.9225,
                'longitude' => 4.4792,
                'timezone' => 'Europe/Amsterdam',
                'is_active' => true,
            ],

            // BELGIA
            [
                'country_id' => $countries['BE'],
                'name' => 'Brussels',
                'province' => 'Brussels-Capital',
                'postal_code' => '1000',
                'latitude' => 50.8503,
                'longitude' => 4.3517,
                'timezone' => 'Europe/Brussels',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['BE'],
                'name' => 'Antwerp',
                'province' => 'Flanders',
                'postal_code' => '2000',
                'latitude' => 51.2194,
                'longitude' => 4.4025,
                'timezone' => 'Europe/Brussels',
                'is_active' => true,
            ],

            // SZWAJCARIA
            [
                'country_id' => $countries['CH'],
                'name' => 'Zurich',
                'province' => 'Zurich',
                'postal_code' => '8001',
                'latitude' => 47.3769,
                'longitude' => 8.5417,
                'timezone' => 'Europe/Zurich',
                'is_active' => true,
            ],
            [
                'country_id' => $countries['CH'],
                'name' => 'Geneva',
                'province' => 'Geneva',
                'postal_code' => '1200',
                'latitude' => 46.2044,
                'longitude' => 6.1432,
                'timezone' => 'Europe/Zurich',
                'is_active' => true,
            ],

            // AUSTRIA
            [
                'country_id' => $countries['AT'],
                'name' => 'Vienna',
                'province' => 'Vienna',
                'postal_code' => '1010',
                'latitude' => 48.2082,
                'longitude' => 16.3738,
                'timezone' => 'Europe/Vienna',
                'is_active' => true,
            ],

            // CZECHY
            [
                'country_id' => $countries['CZ'],
                'name' => 'Prague',
                'province' => 'Prague',
                'postal_code' => '110 00',
                'latitude' => 50.0755,
                'longitude' => 14.4378,
                'timezone' => 'Europe/Prague',
                'is_active' => true,
            ],

            // SZWECJA
            [
                'country_id' => $countries['SE'],
                'name' => 'Stockholm',
                'province' => 'Stockholm',
                'postal_code' => '111 29',
                'latitude' => 59.3293,
                'longitude' => 18.0686,
                'timezone' => 'Europe/Stockholm',
                'is_active' => true,
            ],

            // NORWEGIA
            [
                'country_id' => $countries['NO'],
                'name' => 'Oslo',
                'province' => 'Oslo',
                'postal_code' => '0001',
                'latitude' => 59.9139,
                'longitude' => 10.7522,
                'timezone' => 'Europe/Oslo',
                'is_active' => true,
            ],

            // DANIA
            [
                'country_id' => $countries['DK'],
                'name' => 'Copenhagen',
                'province' => 'Capital Region',
                'postal_code' => '1050',
                'latitude' => 55.6761,
                'longitude' => 12.5683,
                'timezone' => 'Europe/Copenhagen',
                'is_active' => true,
            ],
        ];

        // Dodaj timestamp dla wszystkich rekordów
        $now = Carbon::now();
        foreach ($cities as &$city) {
            $city['created_at'] = $now;
            $city['updated_at'] = $now;
        }

        // Wstaw dane do bazy (batch insert dla lepszej wydajności)
        DB::table('cities')->insert($cities);

        $this->command->info('Dodano ' . count($cities) . ' miast europejskich.');

        // Pokaż statystyki
        $polishCities = array_filter($cities, fn($city) => $city['country_id'] === $countries['PL']);
        $this->command->info('Polskich miast: ' . count($polishCities));
        $this->command->info('Miast z innych krajów: ' . (count($cities) - count($polishCities)));
    }
}
