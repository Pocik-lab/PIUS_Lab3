<?php

namespace App\Domain\Items\Actions;

use App\Domain\Items\Models\Item;

class GetItemAction
{
    public function execute(int $itemId): Item
    {
        return Item::findOrFail($itemId);
    }
}
