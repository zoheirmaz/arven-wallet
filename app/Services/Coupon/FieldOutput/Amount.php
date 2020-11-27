<?php

namespace App\Services\Coupon\FieldOutput;

use App\Entities\Credit;
use Infrastructure\Interfaces\Services\Coupon\FieldOutput\FieldOutputInterface;

class Amount implements FieldOutputInterface
{
    public function output($input)
    {
        return [
            Credit::AMOUNT => $input,
            Credit::REMINDED_AMOUNT => $input,
        ];
    }
}
