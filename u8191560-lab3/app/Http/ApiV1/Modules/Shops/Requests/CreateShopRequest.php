<?php 

namespace App\Http\ApiV1\Modules\Shops\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class CreateShopRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'city' => 'required|string|max:75',
            'street' => 'required|string|max:100',
            'house' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1',
        ];
    }
}