<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AdvanceSalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $employeeIds = DB::table('employees')->pluck('id')->toArray();

        foreach ($employeeIds as $employeeId) {
            $month = $faker->monthName;
            $year = $faker->numberBetween(2020, 2024);
            $advanceSalary = $faker->numberBetween(1000, 5000);

            DB::table('advance_salaries')->insert([
                'employee_id' => $employeeId,
                'month' => $month,
                'year' => $year,
                'advance_salary' => $advanceSalary,
            ]);
        }
    }
}
