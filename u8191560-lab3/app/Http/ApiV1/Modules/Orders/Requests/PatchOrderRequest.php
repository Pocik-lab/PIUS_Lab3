<?php 

namespace App\Http\ApiV1\Modules\Orders\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class PatchOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'shop_id' => 'exists:shops,id',
            'buyer_id' => 'exists:buyers,id',
            'item_id' => 'exists:items,id',
            'quanity' => 'integer|min:0',
            'order_discount' => 'integer|min:0|max:100',
            'packaging_date' => 'date',
            'arrival_date' => 'date',
        ];
    }
}