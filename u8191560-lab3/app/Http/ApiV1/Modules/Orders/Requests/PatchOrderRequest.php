<?php 

namespace App\Http\ApiV1\Modules\Orders\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class PatchOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'quanity' => 'integer|min:0',
            'order_discount' => 'integer|min:0|max:100',
            'packaging_date' => 'date',
            'arrival_date' => 'date',
        ];
    }
}