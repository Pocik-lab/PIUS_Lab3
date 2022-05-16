<?php

namespace App\Domain\Shops\Actions;

use App\Domain\Shops\Models\Shop;

class GetShopAction
{
    public function execute(int $shopId): Shop
    {
        return Shop::findOrFail($shopId);
    }
}
