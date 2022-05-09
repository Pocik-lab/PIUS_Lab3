<?php

namespace App\Domain\Items\Actions;

use App\Domain\Items\Models\Item;

class PatchItemAction 
{
    public function execute(int $itemId, array $fields): Item
    {
        $item = Item::findOrFail($itemId);
        $item->update($fields);
        return $item;
    }
}