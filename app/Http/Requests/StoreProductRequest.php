<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'productName' => 'required|string|max:255',
            'productTypeId' => 'required',
            'productDiameterId' => 'required',
            'productlengthId' => 'required',
            'productvariantId' => 'nullable',
            'productWeightStandard' => 'required|between:0,99.99',
            'kgPerHour' => 'required|between:0,99.99',
            'pcsPerHour' => 'required|between:0,99.99',
            'kgPerDay' => 'required|between:0,99.99',
            'pcsPerDay' => 'required|between:0,99.99',
            'productionAccuracyTolerancePerPcs' => 'required|between:0,99.99',
            'productFormula' => 'required|string',
            'productSocket' => 'required',
        ];
    }
}
