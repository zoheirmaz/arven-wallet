<?php

namespace App\Validations\Credit;

use Infrastructure\Abstracts\ValidationAbstract;

class GetUserCreditAmount extends ValidationAbstract
{
    public function rules(): array
    {
        return [
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
