<?php

namespace App\Domain\Items\Actions;

use App\Domain\Items\Models\Item;

class GetAllItemsAction
{
    public function execute(): array
    {
        return Item::all()->toArray();
    }
}
