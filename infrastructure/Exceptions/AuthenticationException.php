<?php

namespace Infrastructure\Exceptions;

use Infrastructure\Enums\ExceptionEnums;
use Symfony\Component\HttpFoundation\Response;
use Infrastructure\Abstracts\ExceptionAbstract;

class AuthenticationException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::AUTHENTICATION;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_UNAUTHORIZED;
    }
}
