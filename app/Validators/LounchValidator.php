<?php

namespace App\Validators;

class LounchValidator extends BaseValidator
{

    /**
     * Get the validation rules that apply to the data.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required|numeric',
            'type' => 'required|string',
            'user_account_debit' => 'required|string',
            'user_account_credit' => 'required|string',
            'description' => 'required|string',
            'system' => 'required|string',
        ];
    }
}
