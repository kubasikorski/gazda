<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CountriesSeeder::class,
            CitiesSeeder::class,
            UserSeeder::class,
            PropertiesSeeder::class,
            UserPropertyAccessSeeder::class,
            TenantsSeeder::class,
            PropertyRentalAgreementsSeeder::class,
            PropertyRentalAgreementTenantsSeeder::class,
            FeeTypesSeeder::class,
            PropertyRentalFeeTypesSeeder::class,
            PropertyRentalFeesSeeder::class,
        ]);
    }
}
