<?php

namespace Infrastructure\Exceptions;

use Illuminate\Http\Response;
use Infrastructure\Enums\ExceptionEnums;
use Infrastructure\Abstracts\ExceptionAbstract;

class LogicException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::LOGIC;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
