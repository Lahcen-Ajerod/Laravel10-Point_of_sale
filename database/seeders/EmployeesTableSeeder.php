<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            DB::table('employees')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'experience' => $faker->randomElement(['1 year', '2 years', '3 years', '4 years', '5 years']),
                'image' => null,
                'salary' => $faker->randomNumber(5),
                'vacation' => $faker->randomElement(['2 weeks', '3 weeks', '4 weeks']),
                'city' => $faker->city,
            ]);
        }
    }
}
