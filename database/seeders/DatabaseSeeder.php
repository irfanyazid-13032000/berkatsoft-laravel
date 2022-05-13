<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Customer;
use App\Models\SalesOrder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::create(
            [
                'name' => 'bengkoang',
                'price' => 20000
            ],
        );

        Product::create(
            [
                'name' => 'nasi padang',
                'price' => 10000
            ],
        );


        Customer::create(
            [
                'name' => 'Yudi Beriman'
            ]
        );

        Customer::create(
            [
                'name' => 'Tono sang pembawa cahaya'
            ]
        );

        Customer::create(
            [
                'name' => 'Rudi pencipta kapal perang'
            ]
        );

        // SalesOrder::create(
        //     [
        //         'customer_id' => 1,
        //         'product_id' => 2
        //     ]
        // );
    }
}
