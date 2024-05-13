<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AttendencesTableSeeder extends Seeder
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

        $startDate = now()->subMonth(); // Start from last month
        $endDate = now(); // End at current month

        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            foreach ($employeeIds as $employeeId) {
                // Randomly generate attendance status
                $attendStatus = $faker->randomElement(['present', 'absent', 'late']);

                // Insert the attendance record into the attendences table
                DB::table('attendences')->insert([
                    'employee_id' => $employeeId,
                    'date' => $currentDate,
                    'attend_status' => $attendStatus,
                ]);
            }
            // Move to the next day
            $currentDate->addDay();
        }
    }
}
