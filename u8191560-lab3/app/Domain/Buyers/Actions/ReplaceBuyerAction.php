<?php

namespace App\Domain\Buyers\Actions;

use App\Domain\Buyers\Models\Buyer;

class ReplaceBuyerAction
{
    public function execute(int $buyerId, array $fields): Buyer
    {
        $buyer = Buyer::findOrFail($buyerId);
        $buyer->update($fields);
        return $buyer;
    }
}
