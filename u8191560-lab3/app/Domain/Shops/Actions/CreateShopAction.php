<?php

namespace App\Domain\Shops\Actions;

use App\Domain\Shops\Models\Shop;

class CreateShopAction
{
    public function execute(array $fields): Shop
    {
        return Shop::create($fields);
    }
}
