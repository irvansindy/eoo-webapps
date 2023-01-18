<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'productNameUpdate' => 'required|string|max:255',
            'machineUpdateId' => 'required',
            'productTypeUpdateId' => 'required',
            'productDiameterUpdateId' => 'required',
            'productlengthUpdateId' => 'required',
            'productvariantUpdateId' => 'required',
            'productWeightStandardUpdate' => 'required|integer',
            'kgPerHourUpdate' => 'required|integer',
            'pcsPerHourUpdate' => 'required|integer',
            'kgPerDayUpdate' => 'required|integer',
            'pcsPerDayUpdate' => 'required|integer',
            'productionAccuracyTolerancePerPcsUpdate' => 'required|integer',
            'productFormulaUpdate' => 'required|string',
            'productSocketUpdate' => 'required',
        ];
    }
}
