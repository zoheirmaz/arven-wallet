<?php

namespace Infrastructure\Abstracts;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Exceptions\AuthorizationException;

abstract class PolicyAbstract
{
    public $message = null;

    /**
     * @throws AuthorizationException
     */
    protected function userMustBeAuthenticated()
    {
        if (!Auth::check()) {
            throw new AuthorizationException('user must be authenticated');
        }
    }

    public function getMessage()
    {
        return $this->message;
    }
}
