<?php

namespace Database\Seeders;

use App\Models\SalesReport;
use App\Models\Admin;

use Illuminate\Database\Seeder;

class SalesReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $salesReports = SalesReport::factory()
                        ->count(2)
                        ->create();

      $admins = Admin::all();
      foreach($salesReports as $salesReport) {
        $admin = $admins->random();
        $salesReport->adminId = $admin->id;
        $salesReport->save();
        //$salesReport->generate();
      }
    }
}
