<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Device;
use App\Models\Wanted;

class WantedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {
        $faker = Faker::create();

        $devices = Device::all()->pluck("id");

        for ($i = 0; $i < 50; $i++) {
            $wanted = new Wanted();


            $wanted->name = $faker->firstName();
            $wanted->last_name = $faker->lastName();
            $wanted->date_of_birth = $faker->date('Y-m-d');
            $wanted->nationality = $faker->country();
            $wanted->felony = $faker->sentence(3);

            $wanted->device_id = $faker->randomElement($devices);


            $wanted->save();
        }
    }
}
