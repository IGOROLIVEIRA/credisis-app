<?php

namespace App\Validators;

class CityValidator extends BaseValidator
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
            'population' => 'numeric',
            'state_id' => 'required|integer',
        ];
    }
}
