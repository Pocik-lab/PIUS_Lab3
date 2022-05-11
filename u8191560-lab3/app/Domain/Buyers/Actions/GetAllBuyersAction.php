<?php

namespace App\Domain\Buyers\Actions;

use App\Domain\Buyers\Models\Buyer;

class GetAllBuyersAction
{
    public function execute(): array
    {
        return Buyer::all()->toArray();
    }
}
