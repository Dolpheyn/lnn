<?php

namespace Database\Factories;

use App\Models\Deliverer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DelivererFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deliverer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'phoneNumber' => $this->faker->unique()->phoneNumber(),
        'claimableCommission' => 0,
      ];
    }
}
