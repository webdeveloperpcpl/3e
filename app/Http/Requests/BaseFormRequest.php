<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class BaseFormRequest extends FormRequest
{

    public function rules()
    {
    }

    public function authorize()
    {
    }

    public function messages()
    {
    }

    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();

        $response = [];
        foreach ($errors as $field => $message) {

            $response[] = array(

                'field' => $field,
                'message' => $message
            );
        }

        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'message' => __('api.validation_failed'),
                'errors' => $response
            ],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}