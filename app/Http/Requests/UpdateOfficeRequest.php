<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateOfficeRequest extends FormRequest
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
          'officeNameUpdate'=>'required',
          'officeInitialUpdate'=>'required',
          'officeInitialUpdate'=>'required',
          'officeTypeIdUpdate'=>'required',
          'officeProvinceIdUpdate'=>'required',
          'officeCityIdUpdate'=>'required',
          'officeDistrictIdUpdate'=>'required',
          'officeVillageIdUpdate'=>'required',
          'officePostalCodeUpdate'=>'required',
          'officeAddressUpdate'=>'required',
        ];
    }
    public function validate() {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
          
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
}
