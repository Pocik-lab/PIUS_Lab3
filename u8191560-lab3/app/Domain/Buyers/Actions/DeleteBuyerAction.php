<?php

namespace App\Domain\Buyers\Actions;

use App\Domain\Buyers\Models\Buyer;

class DeleteBuyerAction
{
    public function execute(int $buyerId)
    {
        $buyer = Buyer::findOrFail($buyerId);
        $buyer->delete();
        return $buyer;
    }
}