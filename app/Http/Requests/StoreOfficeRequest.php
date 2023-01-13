<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOfficeRequest extends FormRequest
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
            'officeName' => 'required|string|max:255',
            'officeInitial' => 'required|string|max:255',
            'officeTypeId' => 'required',
            'officeProvinceId' => 'required',
            'officeCityId' => 'required',
            'officeDistrictId' => 'required',
            'officeVillageId' => 'required',
            'officePostalCode' => 'required',
            'officeAddress' => 'required|string|max:255',
        ];
    }
    public function validate() {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
          
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
}
