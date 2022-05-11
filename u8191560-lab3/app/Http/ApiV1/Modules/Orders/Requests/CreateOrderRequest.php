<?php 

namespace App\Http\ApiV1\Modules\Orders\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class CreateOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'buyer_id' => 'required|exists:buyers,id',
            'item_id' => 'required|exists:items,id',
            'quanity' => 'required|integer|min:0',
            'order_discount' => 'required|integer|min:0|max:100',
            'packaging_date' => 'required|date',
            'arrival_date' => 'required|date',
        ];
    }
}