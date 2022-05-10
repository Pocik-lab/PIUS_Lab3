<?php 

namespace App\Http\ApiV1\Modules\Items\Controllers;

use App\Domain\Items\Actions\CreateItemAction;
use App\Domain\Items\Actions\DeleteItemAction;
use App\Domain\Items\Actions\GetAllItemsAction;
use App\Domain\Items\Actions\GetItemAction;
use App\Domain\Items\Actions\PatchItemAction;
use App\Domain\Items\Actions\ReplaceItemAction;
use App\Http\ApiV1\Modules\Items\Requests\CreateItemRequest;
use App\Http\ApiV1\Modules\Items\Requests\PatchItemRequest;
use App\Http\ApiV1\Modules\Items\Requests\ReplaceItemRequest;
use App\Http\ApiV1\Modules\Items\Resources\ItemResource;

class ItemController
{
    public function getList(GetAllItemsAction $action)
    {
        $items = $action->execute();
        return response()->json($items);
    }

    public function get(GetItemAction $action, int $itemId)
    {
        return new ItemResource($action->execute($itemId));
    }

    public function post(CreateItemAction $action, CreateItemRequest $request)
    {
        return new ItemResource($action->execute($request->validated()));
    }

    public function delete(DeleteItemAction $action, int $itemId)
    {
        return new ItemResource($action->execute($itemId));
    }

    public function patch(PatchItemAction $action, PatchItemRequest $request, int $itemId)
    {
        return new ItemResource($action->execute($itemId, $request->validated()));
    }

    public function put(ReplaceItemAction $action, ReplaceItemRequest $request, int $itemId)
    {
        return new ItemResource($action->execute($itemId, $request->validated()));
    }
}