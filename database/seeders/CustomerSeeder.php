<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Address;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Generate 5 customers with 2 addresses each.
      Customer::factory()
        ->count(5)
        ->hasAddresses(2)
        ->create();
    }
}
