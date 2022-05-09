<?php 

namespace App\Domain\Buyers\Actions;

use App\Domain\Buyers\Models\Buyer;

class CreateBuyerAction
{
    public function execute(array $fields): Buyer
    {
        return Buyer::create($fields);
    }
}