<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Deliverer;
use App\Models\Order;
use App\Models\Payment;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Create 10 order with a random Customer and Deliverer(if state =
      // ReadyForPickup | OurForDelivery | Completed)
      $orders = Order::factory()
                      ->count(10)
                      ->state(new Sequence(
                          ['status' => 'Preparing'],
                          ['status' => 'Cooking'],
                          ['status' => 'ReadyForPickup'],
                          ['status' => 'OutForDelivery'],
                          ['status' => 'Completed'],
                      ))
                      ->create();



      $ordersShouldHaveDeliverer = $orders
          ->whereIn('status', ['OutForDelivery', 'Completed']);
      $deliverers = Deliverer::all();
      foreach ($ordersShouldHaveDeliverer as $order) {
        $deliverer = $deliverers->random();
        $deliverer->orders()->save($order);
      }

      $customers = Customer::all();
      foreach ($orders as $order) {
        $customer = $customers->random();
        $customer->orders()->save($order);

        Payment::factory()->for($order)->create();
      }
    }
}
