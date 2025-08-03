<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Partyzantów',
                'description' => 'Dwupokojowe mieszkanie we Wrzeszczu z osobną kuchnią. Doskonała lokalizacja, blisko komunikacji miejskiej i sklepów.',
                'address' => 'Partyzantów 51a/1',
                'postal_code' => '80-254',
                'city_id' => 4, // ID miasta z tabeli cities
                'latitude' => 54.37949489681252,
                'longitude' => 18.596499004608813,
                'property_type' => 'apartment',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'area' => 52.8,
                'area_unit' => 'sqm',
                'floor' => 1,
                'total_floors' => 4,
                'furnishing_status' => 'fully_furnished',
                'created_by' => 1,
                'is_available' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Przytulna',
                'description' => 'Trzypokojowe mieszkanie w dobrej lokalizacji.',
                'address' => 'ul. Przytulna 32/16',
                'postal_code' => '80-176',
                'city_id' => 4,
                'latitude' => 54.349755032876146,
                'longitude' => 18.529774282291246,
                'property_type' => 'apartment',
                'bedrooms' => 3,
                'bathrooms' => 1,
                'area' => 53.14,
                'area_unit' => 'sqm',
                'floor' => 2,
                'total_floors' => 4,
                'furnishing_status' => 'semi_furnished',
                'created_by' => 1,
                'is_available' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Aalto',
                'description' => 'Trzypokojowe mieszkanie w nowoczesnym budynku Aalto. Doskonała lokalizacja, blisko komunikacji miejskiej i sklepów.',
                'address' => 'ul. Ogrodowa',
                'postal_code' => '80-299',
                'city_id' => 4, // ID miasta z tabeli cities
                'latitude' => 54.36863006821271,
                'longitude' => 18.573852927697885,
                'property_type' => 'apartment',
                'bedrooms' => 3,
                'bathrooms' => 1,
                'area' => 60.82,
                'area_unit' => 'sqm',
                'floor' => 1,
                'total_floors' => 1,
                'furnishing_status' => 'unfurnished',
                'created_by' => 1,
                'is_available' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Srebrniki',
                'description' => 'Dwupoziomowe mieszkanie w spokojnej okolicy. Idealne dla rodziny.',
                'address' => 'ul. Srebrniki 5b/20',
                'postal_code' => '80-282',
                'city_id' => 4,
                'latitude' => 54.37664282311659,
                'longitude' => 18.57912003166226,
                'property_type' => 'apartment',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 87.56,
                'area_unit' => 'sqm',
                'floor' => 3,
                'total_floors' => 3,
                'furnishing_status' => 'fully_furnished',
                'created_by' => 1,
                'is_available' => false,
                'is_published' => true,
            ],
        ];

        $now = Carbon::now();

        foreach ($properties as &$property) {
            $property['uuid'] = Str::uuid()->toString();
            $property['created_at'] = $now;
            $property['updated_at'] = $now;
        }

        DB::table('properties')->insert($properties);

        $this->command->info('Dodano ' . count($properties) . ' nieruchomości.');

        foreach ($properties as $property) {
            $this->command->line("✓ {$property['title']} ({$property['property_type']}, {$property['area']} {$property['area_unit']})");
        }
    }
}
