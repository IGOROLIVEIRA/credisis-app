<?php

namespace App\Validators;

class StateValidator extends BaseValidator
{

    /**
     * Get the validation rules that apply to the data.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255|unique:countries,name',
            'initials' => 'required|string|min:2|max:2|unique:countries,initials',
            'country_id' => 'required|integer',
        ];
    }
}
