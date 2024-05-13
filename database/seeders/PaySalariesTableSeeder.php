<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PaySalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all employee ids from the employees table
        $employeeIds = DB::table('employees')->pluck('id')->toArray();

        // Generate pay salaries for each employee
        foreach ($employeeIds as $employeeId) {
            // Generate salary details for a random month
            $salaryMonth = $faker->monthName;
            $paidAmount = $faker->numberBetween(2000, 7000);
            $advanceSalary = $faker->numberBetween(0, 2000);
            $dueSalary = $faker->numberBetween(0, 3000);

            // Insert the pay salary record into the pay_salaries table
            DB::table('pay_salaries')->insert([
                'employee_id' => $employeeId,
                'salary_month' => $salaryMonth,
                'paid_amount' => $paidAmount,
                'advance_salary' => $advanceSalary,
                'due_salary' => $dueSalary,
            ]);
        }
    }
}
