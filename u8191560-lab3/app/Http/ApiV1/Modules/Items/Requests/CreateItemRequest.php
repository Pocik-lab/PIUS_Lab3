<?php 

namespace App\Http\ApiV1\Modules\Items\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class CreateItemRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'cost' => 'required|integer|min:1000',
        ];
    }
}