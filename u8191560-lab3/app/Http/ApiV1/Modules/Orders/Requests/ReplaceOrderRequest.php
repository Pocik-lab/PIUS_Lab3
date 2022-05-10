<?php 

namespace App\Http\ApiV1\Modules\Orders\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class ReplaceOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'shop_id' => 'integer',
            'buyer_id' => 'integer',
            'item_id' => 'integer',
            'quanity' => 'integer|min:0',
            'order_discount' => 'integer|min:0|max:100',
            'packaging_date' => 'date',
            'arrival_date' => 'date',
        ];
    }
}