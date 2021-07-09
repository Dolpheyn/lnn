<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\SalesReport;
use App\Models\SalesReportOrder;

use Illuminate\Database\Seeder;

class SalesReportOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salesReports = SalesReport::all();

        foreach($salesReports as $report) {
          $from = $report->from;
          $to = $report->to;

          $orders = Order::whereBetween('created_at', [$from, $to])->get();
          foreach($orders as $order) {
            SalesReportOrder::create([
              'salesReportId' => $report->id,
              'orderId' => $order->id,
            ]);
          }
        }
    }
}
