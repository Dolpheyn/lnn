<?php

namespace Database\Seeders;

use App\Models\OrderFood;
use App\Models\Order;
use App\Models\Food;

use Illuminate\Database\Seeder;

class OrderFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $foods = Food::all();

        foreach($orders as $order) {
          $orderFoods = $foods->random(3);

          foreach($orderFoods as $orderFood) {
            OrderFood::create([
              'orderId' => $order->id,
              'foodId' => $orderFood->id,
            ]);
          }
        }
    }
}
