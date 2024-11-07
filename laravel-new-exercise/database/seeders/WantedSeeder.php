<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WantedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('wanted')->insert([
                'name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'date_of_birth' => $faker->date('Y-m-d'),
                'nationality' => $faker->country(),
                'felony' => $faker->sentence(3),
            ]);
        }
    }
}