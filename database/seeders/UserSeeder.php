<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Robert Sikorski',
            'email' => 'kuba.sikorski@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        User::factory()->create([
            'name' => 'Monika Sikorska',
            'email' => 'msikosrka@gumed.edu.pl',
            'password' => bcrypt('1234'),
        ]);
        User::factory()->create([
            'name' => 'Emil Paduszyński',
            'email' => 'emipad04461@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        User::factory()->create([
            'name' => 'Tomasz Zdolski',
            'email' => 'zdolski.tomasz@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        User::factory()->create([
            'name' => 'Aneta Zdolska',
            'email' => 'aneta.zdolska@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
