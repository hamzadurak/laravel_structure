<?php

namespace App\Http\Requests\Language;

use App\Http\Requests\General\BaseFormRequest;
use App\Models\Languages\Language;

class LanguageUpdateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:'.(new Language())->getTable().',name,'.request()->route('language')],
            'locale' => 'required',
            'lc' => 'required',
            'status' => 'required',
        ];
    }

}
