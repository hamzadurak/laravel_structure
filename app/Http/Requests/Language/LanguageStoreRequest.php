<?php

namespace App\Http\Requests\Language;

use App\Http\Requests\General\BaseFormRequest;
use App\Models\Languages\Language;

class LanguageStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:'.(new Language())->getTable().',name',
            'locale' => 'required|string',
            'lc' => 'required|string',
            'status' => 'required|numeric',
        ];
    }
}
