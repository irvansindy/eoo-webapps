<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDiameterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'updateProductDiameter' => 'required|integer',
            'updateProductDiameterUnit' => 'required'
            // 'productDiameter0Unit' => [
            //     'required|string',
            //     Rule::in(['inch', 'milimeter'])
            // ]
        ];
    }
}
