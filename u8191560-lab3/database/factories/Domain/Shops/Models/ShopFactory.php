<?php

namespace Database\Factories\Domain\Shops\Models;

use App\Domain\Shops\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    protected $model = Shop::class;
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
