<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
            EmployeesTableSeeder::class,
            CustomersTableSeeder::class,
            SuppliersTableSeeder::class,
            AdvanceSalariesTableSeeder::class,
            PaySalariesTableSeeder::class,
            AttendencesTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            ExpensesTableSeeder::class,
            OrdersTableSeeder::class,
            OrderDetailsTableSeeder::class,
            PermissionsSeeder::class,
            ModelHasPermissionsSeeder::class
            ]
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
