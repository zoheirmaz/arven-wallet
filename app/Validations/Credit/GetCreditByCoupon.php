<?php

namespace App\Validations\Credit;

use Infrastructure\Abstracts\ValidationAbstract;

class GetCreditByCoupon extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'coupon_id' => [
                'required',
                'integer'
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

        ];
    }
}
