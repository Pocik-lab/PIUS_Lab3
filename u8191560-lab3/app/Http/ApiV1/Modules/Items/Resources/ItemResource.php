<?php 

namespace App\Http\ApiV1\Modules\Items\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class ItemResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'cost' => $this->cost,
        ];
    }
}