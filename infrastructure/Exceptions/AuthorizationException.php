<?php

namespace Infrastructure\Exceptions;

use Illuminate\Http\Response;
use Infrastructure\Enums\ExceptionEnums;
use Infrastructure\Abstracts\ExceptionAbstract;

class AuthorizationException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::AUTHORIZATION;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_FORBIDDEN;
    }
}
