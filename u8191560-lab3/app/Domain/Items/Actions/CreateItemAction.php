<?php 

namespace App\Domain\Items\Actions;

use App\Domain\Items\Models\Item;

class CreateItemAction
{
    public function execute(array $fields): Item
    {
        return Item::create($fields);
    }
}