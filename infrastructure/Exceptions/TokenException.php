<?php

namespace Infrastructure\Exceptions;

use Infrastructure\Enums\ExceptionEnums;
use Symfony\Component\HttpFoundation\Response;
use Infrastructure\Abstracts\ExceptionAbstract;

class TokenException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::TOKEN_EXPIRE;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_UNAUTHORIZED;
    }
}
