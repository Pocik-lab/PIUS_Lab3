<?php 

namespace App\Http\ApiV1\Modules\Items\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
class PatchItemRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'string|max:50',
            'name' => 'string|max:100',
            'description' => 'string|max:500',
            'cost' => 'integer|min:1000',
        ];
    }
}