<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Orders\Models\Order;

class UpdateOrderAction
{
    public function execute(int $orderId, array $fields): Order
    {
        $order = Order::findOrFail($orderId);
        $order->update($fields);
        return $order;
    }
}