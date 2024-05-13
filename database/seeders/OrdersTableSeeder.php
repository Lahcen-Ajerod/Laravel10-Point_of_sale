<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Get all customer ids from the customers table
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        // Generate orders
        for ($i = 0; $i < 10; $i++) {
            $customerId = $faker->randomElement($customerIds);
            $orderDate = $faker->date();
            $orderStatus = $faker->randomElement(['pending', 'processing', 'completed']);
            $totalProducts = $faker->numberBetween(1, 10);
            $subTotal = $faker->randomFloat(2, 100, 1000);
            $vat = $subTotal * 0.1;
            $invoiceNo = $faker->ean13;
            $total = $subTotal + $vat;
            $paymentStatus = $faker->randomElement(['paid', 'unpaid']);
            // Assuming pay amount equals total if payment status is paid, otherwise randomly generate pay amount
            $pay = $paymentStatus == 'paid' ? $total : $faker->randomFloat(2, 10, $total);
            $due = $paymentStatus == 'unpaid' ? $total - $pay : 0;

            // Insert the order record into the orders table
            DB::table('orders')->insert([
                'customer_id' => $customerId,
                'order_date' => $orderDate,
                'order_status' => $orderStatus,
                'total_products' => $totalProducts,
                'sub_total' => $subTotal,
                'vat' => $vat,
                'invoice_no' => $invoiceNo,
                'total' => $total,
                'payment_status' => $paymentStatus,
                'pay' => $pay,
                'due' => $due,
            ]);
        }
    }
}
