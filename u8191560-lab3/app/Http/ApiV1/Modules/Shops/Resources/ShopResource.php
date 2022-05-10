<?php 

namespace App\Http\ApiV1\Modules\Shops\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class ShopResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'street' => $this->street,
            'house' => $this->house,
            'floor' => $this->floor,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}