<?php

namespace Infrastructure\Exceptions;

use Illuminate\Http\Response;
use Infrastructure\Enums\ExceptionEnums;
use Infrastructure\Abstracts\ExceptionAbstract;

class InternalException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::INTERNAL;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
