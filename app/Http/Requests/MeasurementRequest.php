<?php

namespace App\Http\Requests;



class MeasurementRequest  extends BaseFormRequest

{

    public function authorize()
    {

        return true;
    }

    public function rules()
    {

        switch ($this->method()) {

            case 'POST':
                return [
                    'value' => 'required|numeric',
                ];
            default:
                break;
        }
    }

    public function messages()
    {

        return [];
    }

    public function filters()
    {

        return [];
    }

}