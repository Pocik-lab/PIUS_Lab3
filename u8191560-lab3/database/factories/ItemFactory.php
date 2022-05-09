<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
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
            'type' => $this->faker->text(15),
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(250),
            'cost' => $this->faker->randomDigitNotNull(),
        ];
    }
}
