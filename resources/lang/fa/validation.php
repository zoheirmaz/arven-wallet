<?php

return [
    'credit' => [
        'charge' => [
            'mobile' => [
                'numeric' => 'فرمت شماره همراه وارد شده صحیح نمی باشد.',
                'required' => 'شماره همراه خود را وارد کنید.',
            ],
            'amount' => [
                'gte' => 'امکان شارژ اعتبار کمتر از %s تومان امکان پذیر نمی باشد.',
                'required' => 'مقدار اعتبار را وارد کنید.',
            ],
        ]
    ],
];
