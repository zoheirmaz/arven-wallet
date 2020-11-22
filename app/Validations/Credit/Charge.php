<?php

namespace App\Validations\Credit;

use Infrastructure\Abstracts\ValidationAbstract;

class Charge extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'amount' => [
                'required',
                'gte:' . config('credit.minimum_chargeable_amount'),
            ],
            'mobile' => [
                'required',
                'numeric'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.gte' => sprintf(
                __('validation.credit.charge.amount.gte'),
                config('credit.minimum_chargeable_amount')
            ),
            'amount.required' => __('validation.credit.charge.amount.required'),

            'mobile.required' => __('validation.credit.charge.mobile.required'),
            'mobile.numeric' => __('validation.credit.charge.mobile.numeric'),
        ];
    }
}
