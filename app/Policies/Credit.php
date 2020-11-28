<?php

namespace App\Policies;

use Infrastructure\Abstracts\PolicyAbstract;

class Credit extends PolicyAbstract
{
    public function charge()
    {
        return true;
    }

    public function getCreditByCoupon()
    {
        return true;
    }

    public function getUserCreditAmount()
    {
        return true;
    }

    public function getUserCredits()
    {
        return true;
    }
}
