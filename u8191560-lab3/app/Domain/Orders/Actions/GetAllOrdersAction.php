<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Orders\Models\Order;

class GetAllOrdersAction
{
    public function execute(): array
    {
        return Order::all()->toArray();
    }
}