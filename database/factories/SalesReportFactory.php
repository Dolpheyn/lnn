<?php

namespace Database\Factories;

use App\Models\SalesReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'report' => ('/' . implode(
                              '/',
                              $this->faker->words(
                                $this->faker->numberBetween(0, 4)
                              )
                        )),
          'description' => $this->faker->sentence(),
          'from' => $this->faker->dateTimeBetween('-1 month', 'now'),
          'to' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
