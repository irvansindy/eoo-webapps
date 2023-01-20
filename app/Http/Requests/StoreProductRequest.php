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
            'productTypeId' => 'required|integer',
            'productDiameterId' => 'required|integer',
            'productlengthId' => 'required|integer',
            'productvariantId' => 'nullable|integer',
            'productWeightStandard' => 'required|integer',
            'kgPerHour' => 'required|integer',
            'pcsPerHour' => 'required|integer',
            'kgPerDay' => 'required|integer',
            'pcsPerDay' => 'required|integer',
            'productionAccuracyTolerancePerPcs' => 'required|integer',
            'productFormula' => 'required|string',
            'productSocket' => 'required|string',
        ];
    }
}
