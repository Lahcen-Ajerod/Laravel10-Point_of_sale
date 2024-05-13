<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate expenses for a period of time
        for ($i = 0; $i < 50; $i++) { 
            $details = $faker->sentence;
            $amount = $faker->randomFloat(2, 10, 1000); 
            $month = $faker->monthName;
            $year = $faker->numberBetween(2020, 2024);
            $date = $faker->date();

            // Insert the expense record into the expenses table
            DB::table('expenses')->insert([
                'details' => $details,
                'amount' => $amount,
                'month' => $month,
                'year' => $year,
                'date' => $date,
            ]);
        }
    }
}
