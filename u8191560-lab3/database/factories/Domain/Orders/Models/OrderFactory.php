<?php

namespace Database\Factories\Domain\Orders\Models;

use App\Domain\Buyers\Models\Buyer;
use App\Domain\Items\Models\Item;
use App\Domain\Shops\Models\Shop;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker = Faker::create('ru_RU');
        return [
            'shop_id'=> Shop::factory(),
            'buyer_id'=> Buyer::factory(),
            'item_id'=> Item::factory(),
            'quanity' => $this->faker->randomDigitNotNull(),
            'order_discount' => $this->faker->randomDigitNotNull(),
            'packaging_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'arrival_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
