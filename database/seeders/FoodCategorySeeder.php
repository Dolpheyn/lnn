<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'Drink',
        'AlaCarte',
        'Meal',
        'Snack',
        'Side'
      ];

      foreach($categories as $category) {
        FoodCategory::create([
          'name' => $category
        ]);
      }
    }
}
