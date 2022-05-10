<?php 

namespace App\Http\ApiV1\Modules\Orders\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class CreateOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'shop_id' => 'required|integer',
            'buyer_id' => 'required|integer',
            'item_id' => 'required|integer',
            'quanity' => 'required|integer|min:0',
            'order_discount' => 'required|integer|min:0|max:100',
            'packaging_date' => 'required|date',
            'arrival_date' => 'required|date',
        ];
    }
}