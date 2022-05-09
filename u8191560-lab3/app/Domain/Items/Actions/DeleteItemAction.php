<?php

namespace App\Domain\Items\Actions;

use App\Domain\Items\Models\Item;

class DeleteItemAction
{
    public function execute(int $itemId)
    {
        $item = Item::findOrFail($itemId);
        $item->delete();
        return $item;
    }
}