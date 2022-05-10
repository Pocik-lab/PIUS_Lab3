<?php

namespace App\Domain\Shops\Actions;

use App\Domain\Shops\Models\Shop;

class ReplaceShopAction
{
    public function execute(int $shopId, array $fields): Shop
    {
        $shop = Shop::findOrFail($shopId);
        $shop->update($fields);
        return $shop;
    }
}