<?php

namespace App\Domain\Shops\Actions;

use App\Domain\Shops\Models\Shop;

class DeleteShopAction
{
    public function execute(int $shopId)
    {
        $shop = Shop::findOrFail($shopId);
        $shop->delete();
        return $shop;
    }
}