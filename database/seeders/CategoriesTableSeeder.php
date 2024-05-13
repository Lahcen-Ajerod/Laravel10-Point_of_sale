<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = ['Electronics', 'Clothing', 'Books', 'Home & Kitchen', 'Toys', 'Beauty', 'Sports', 'Food', 'Health', 'Garden'];

        foreach ($categories as $categoryName) {
            DB::table('categories')->insert([
                'category_name' => $categoryName,
            ]);
        }
    }
}
