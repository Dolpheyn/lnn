<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Cart;
use App\Models\CartFood;
use App\Models\Food;
use App\Models\Payment;

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();
        $foods = Food::all();

        foreach($customers as $customer) {
          $cart = Cart::factory()
            ->for($customer)
            ->create();

          // Attach foods
          $cartFoods = $foods->random(3);
          foreach($cartFoods as $cartFood) {
            CartFood::create([
              'cartId' => $cart->id,
              'foodId' => $cartFood->id,
            ])
          }
        }
    }
}
