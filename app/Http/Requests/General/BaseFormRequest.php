<?php

namespace App\Http\Requests\General;

use App\Exceptions\FormRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    /**
     * @throws FormRequestException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new FormRequestException($validator->errors());
    }
}
