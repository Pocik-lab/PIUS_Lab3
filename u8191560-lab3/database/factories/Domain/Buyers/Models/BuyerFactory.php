<?php

namespace Database\Factories\Domain\Buyers\Models;

use App\Domain\Buyers\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buyer>
 */
class BuyerFactory extends Factory
{
    protected $model = Buyer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker = Faker::create('ru_RU');
        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
        ];
    }
}
