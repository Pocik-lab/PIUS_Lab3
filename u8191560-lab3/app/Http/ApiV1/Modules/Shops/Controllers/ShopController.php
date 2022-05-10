<?php 

namespace App\Http\ApiV1\Modules\Shops\Controllers;

use App\Domain\Shops\Actions\CreateShopAction;
use App\Domain\Shops\Actions\DeleteShopAction;
use App\Domain\Shops\Actions\GetAllShopsAction;
use App\Domain\Shops\Actions\GetShopAction;
use App\Domain\Shops\Actions\PatchShopAction;
use App\Domain\Shops\Actions\ReplaceShopAction;
use App\Http\ApiV1\Modules\Shops\Requests\CreateShopRequest;
use App\Http\ApiV1\Modules\Shops\Requests\PatchShopRequest;
use App\Http\ApiV1\Modules\Shops\Requests\ReplaceShopRequest;
use App\Http\ApiV1\Modules\Shops\Resources\ShopResource;

class ShopController
{
    public function getList(GetAllShopsAction $action)
    {
        $shops = $action->execute();
        return response()->json($shops);
    }

    public function get(GetShopAction $action, int $shopId)
    {
        return new ShopResource($action->execute($shopId));
    }

    public function post(CreateShopAction $action, CreateShopRequest $request)
    {
        return new ShopResource($action->execute($request->validated()));
    }

    public function delete(DeleteShopAction $action, int $shopId)
    {
        return new ShopResource($action->execute($shopId));
    }

    public function patch(PatchShopAction $action, PatchShopRequest $request, int $shopId)
    {
        return new ShopResource($action->execute($shopId, $request->validated()));
    }

    public function put(ReplaceShopAction $action, ReplaceShopRequest $request, int $shopId)
    {
        return new ShopResource($action->execute($shopId, $request->validated()));
    }
}