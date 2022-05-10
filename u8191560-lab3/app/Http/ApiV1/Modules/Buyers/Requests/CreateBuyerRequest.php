<?php 

namespace App\Http\ApiV1\Modules\Buyers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class CreateBuyerRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone' => 'required|string',
            'street' => 'required|string|max:150',
            'city' => 'required|string|max:75',
        ];
    }
}