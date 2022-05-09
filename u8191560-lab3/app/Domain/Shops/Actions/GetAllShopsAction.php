<?php

namespace App\Domain\Shops\Actions;

use App\Domain\Shops\Models\Shop;

class GetAllShopsAction
{
    public function execute(): array
    {
        return Shop::all()->toArray();
    }
}