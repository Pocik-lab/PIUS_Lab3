<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domain\Buyers\Models\Buyer;
use App\Domain\Items\Models\Item;
use App\Domain\Orders\Models\Order;
use App\Domain\Shops\Models\Shop;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create('ru_RU');
        Order::factory()
                ->count(10)
                ->has(Buyer::factory()->count($this->faker->randomDigitNotNull), 'buyers')
                ->has(Item::factory()->count($this->faker->randomDigitNotNull), 'items')
                ->has(Shop::factory()->count($this->faker->randomDigitNotNull), 'shops')
                ->create();
    }
}
