<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class BaseTicketRequest extends FormRequest
{
    public function mappedAttributes(){
        $attributeMap = [

        ];
    }
    public function messages()
    {
        return [
            'data.attributes.status' => 'The data.attributes.status value is invalid. Please use A, C, H or X'
        ];
    }
}
