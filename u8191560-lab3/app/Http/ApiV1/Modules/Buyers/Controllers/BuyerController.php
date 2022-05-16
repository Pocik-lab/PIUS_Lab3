<?php

namespace App\Http\ApiV1\Modules\Buyers\Controllers;

use App\Domain\Buyers\Actions\CreateBuyerAction;
use App\Domain\Buyers\Actions\DeleteBuyerAction;
use App\Domain\Buyers\Actions\GetAllBuyersAction;
use App\Domain\Buyers\Actions\GetBuyerAction;
use App\Domain\Buyers\Actions\PatchBuyerAction;
use App\Domain\Buyers\Actions\ReplaceBuyerAction;
use App\Http\ApiV1\Modules\Buyers\Requests\CreateBuyerRequest;
use App\Http\ApiV1\Modules\Buyers\Requests\PatchBuyerRequest;
use App\Http\ApiV1\Modules\Buyers\Requests\ReplaceBuyerRequest;
use App\Http\ApiV1\Modules\Buyers\Resources\BuyerResource;

class BuyerController
{
    public function getList(GetAllBuyersAction $action)
    {
        $buyers = $action->execute();
        return response()->json(["data" => $buyers]);
    }

    public function get(GetBuyerAction $action, int $buyerId)
    {
        return new BuyerResource($action->execute($buyerId));
    }

    public function post(CreateBuyerAction $action, CreateBuyerRequest $request)
    {
        return new BuyerResource($action->execute($request->validated()));
    }

    public function delete(DeleteBuyerAction $action, int $buyerId)
    {
        return new BuyerResource($action->execute($buyerId));
    }

    public function patch(PatchBuyerAction $action, PatchBuyerRequest $request, int $buyerId)
    {
        return new BuyerResource($action->execute($buyerId, $request->validated()));
    }

    public function put(ReplaceBuyerAction $action, ReplaceBuyerRequest $request, int $buyerId)
    {
        return new BuyerResource($action->execute($buyerId, $request->validated()));
    }
}
