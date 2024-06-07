<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all category ids from the categories table
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Get all supplier ids from the suppliers table
        $supplierIds = DB::table('suppliers')->pluck('id')->toArray();

        // Generate products
        for ($i = 0; $i < 10; $i++) { // Adjust 50 to the number of products you want
            $productName = $faker->word;
            $categoryId = $faker->randomElement($categoryIds);
            $supplierId = $faker->randomElement($supplierIds);
            $productCode = $faker->ean13;
            $productGarage = $faker->word;
            $productImage = 'upload/no_image.jpg';
            $productStore = $faker->word;
            $buyingDate = $faker->date();
            $expireDate = $faker->date();
            $buyingPrice = $faker->randomFloat(2, 10, 1000);
            $sellingPrice = $buyingPrice * $faker->randomFloat(0, 1.1, 1.5);

            // Insert the product record into the products table
            DB::table('products')->insert([
                'product_name' => $productName,
                'category_id' => $categoryId,
                'supplier_id' => $supplierId,
                'product_code' => $productCode,
                'product_garage' => $productGarage,
                'product_image' => $productImage,
                'product_store' => $productStore,
                'buying_date' => $buyingDate,
                'expire_date' => $expireDate,
                'buying_price' => $buyingPrice,
                'selling_price' => $sellingPrice,
            ]);
        }
    }
}
