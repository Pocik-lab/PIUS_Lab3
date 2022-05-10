<?php 

namespace App\Http\ApiV1\Modules\Buyers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class PatchBuyerRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:100',
            'lastname' => 'string|max:100',
            'phone' => 'string',
            'street' => 'string|max:150',
            'city' => 'string|max:75',
        ];
    }
}