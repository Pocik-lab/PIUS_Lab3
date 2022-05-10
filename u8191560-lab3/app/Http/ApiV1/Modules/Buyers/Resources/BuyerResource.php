<?php 

namespace App\Http\ApiV1\Modules\Buyers\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class BuyerResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'street' => $this->street,
            'city' => $this->city,
        ];
    }
}