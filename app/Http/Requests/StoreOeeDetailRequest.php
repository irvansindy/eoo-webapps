<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOeeDetailRequest extends FormRequest
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
            'productId'=>'required',
            // 'adapterZone'=>'required',
            // 'screwSpeed'=>'required',
            // 'dosingSpeed'=>'required',
            // 'mainDrive'=>'required',
            // 'vacumCylinder'=>'required',
            // 'meltTemp'=>'required',
            // 'meltPress'=>'required',
            // 'vacumTank'=>'required',
            // 'haulOffSpeed'=>'required',
            // 'waterTemp'=>'required',
            // 'waterPress'=>'required',
        ];
    }
}
