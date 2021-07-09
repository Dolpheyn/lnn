<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->word(),
          'price' => $this->faker->randomDigit(),
          'description' => $this->faker->paragraph(),
          'img' => $this->faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
