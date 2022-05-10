<?php 

namespace App\Http\ApiV1\Modules\Orders\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class OrderResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'buyer_id' => $this->buyer_id,
            'item_id' => $this->item_id,
            'quanity' => $this->quanity,
            'order_discount' => $this->order_discount,
            'packaging_date' => $this->packaging_date,
            'arrival_date' => $this->arrival_date,
        ];
    }
}