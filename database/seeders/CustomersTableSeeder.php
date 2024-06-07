<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
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
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'shopname' => $faker->company,
                'image' => 'upload/no_image.jpg',
                'account_holder' => $faker->name,
                'account_number' => $faker->bankAccountNumber,
                'bank_name' => $faker->company,
                'bank_branch' => $faker->city,
                'city' => $faker->city,
            ]);
        }
    }
}
