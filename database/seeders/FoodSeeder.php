<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $foods = Food::factory()
                  ->count(10)
                  ->create();

      // Assign each food a random category
      $categories = FoodCategory::all();
      foreach($foods as $food) {
        $category = $categories->random();
        $food->categoryId = $category->id;
        $food->save();
      }
    }
}
