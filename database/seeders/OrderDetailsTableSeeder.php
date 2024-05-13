<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all order ids from the orders table
        $orderIds = DB::table('orders')->pluck('id')->toArray();

        // Get all product ids from the products table
        $productIds = DB::table('products')->pluck('id')->toArray();

        // Generate order details
        foreach ($orderIds as $orderId) {
            $numOrderDetails = $faker->numberBetween(1, 10); 

            // Randomly select products and insert order details for them
            for ($i = 0; $i < $numOrderDetails; $i++) {
                $productId = $faker->randomElement($productIds);
                $quantity = $faker->numberBetween(1, 10); 
                $unitCost = $faker->randomFloat(2, 10, 100); 
                $total = $quantity * $unitCost;

                DB::table('orderdetails')->insert([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'unitcost' => $unitCost,
                    'total' => $total,
                ]);
            }
        }
    }
}
