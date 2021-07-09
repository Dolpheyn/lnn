<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'paid' => $this->faker->boolean(),
          'total' => $this->faker->randomDigit(),
          'paymentMethod' => $this->faker->randomElement(['FPX', 'COD', '']),
        ];
    }
}
