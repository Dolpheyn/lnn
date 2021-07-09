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
      $customers = Customer::factory()
        ->count(5)
        ->hasAddresses(2)
        ->create();

      // Set 1 random address to be the active address.
      foreach($customers as $customer) {
        $randomAddress = $customer->addresses->random();
        $randomAddress->isActive = 1;
        $randomAddress->save();
      }
    }
}
