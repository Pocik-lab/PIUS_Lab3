<?php 

namespace App\Http\ApiV1\Modules\Shops\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class UpdateShopRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'city' => 'string|max:75',
            'street' => 'string|max:100',
            'house' => 'integer|min:1',
            'floor' => 'integer|min:1',
        ];
    }
}