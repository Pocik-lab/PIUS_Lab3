<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker = Faker::create('ru_RU');
        return [
            'quanity' => $this->faker->randomDigitNotNull(),
            'order_discount' => $this->faker->randomDigitNotNull(),
            'packaging_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'arrival_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
