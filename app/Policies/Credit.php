<?php

namespace App\Policies;

use Infrastructure\Abstracts\PolicyAbstract;

class Credit extends PolicyAbstract
{
    public function charge()
    {
        return true;
    }
}
