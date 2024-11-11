<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Device;
use App\Models\Wanted;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:15',
            'last_name' => 'required|string|max:25',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:25',
            'felony' => 'required|string|max:100',
            'device_type' => 'required|exists:device,id'
        ]);


        $wanted = new Wanted();
        $wanted->name = $validatedData['name'];
        $wanted->last_name = $validatedData['last_name'];
        $wanted->date_of_birth = $validatedData['date_of_birth'];
        $wanted->nationality = $validatedData['nationality'];
        $wanted->felony = $validatedData['felony'];
        $wanted->device_id = $validatedData['device_id'];


        $wanted->save();
    }
}