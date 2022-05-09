<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
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
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->randomDigitNotNull(),
            'floor' => $this->faker->randomDigitNotNull(),
        ];
    }
}
