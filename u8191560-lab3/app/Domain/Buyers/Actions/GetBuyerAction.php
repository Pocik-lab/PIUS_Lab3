<?php 

namespace App\Domain\Buyers\Actions;

use App\Domain\Buyers\Models\Buyer;

class GetBuyerAction
{
    public function execute(int $buyerId): Buyer
    {
        return Buyer::findOrFail($buyerId);
    }
}