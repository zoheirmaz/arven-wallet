<?php

namespace Infrastructure\Exceptions;

use Illuminate\Http\Response;
use Infrastructure\Enums\ExceptionEnums;
use Infrastructure\Abstracts\ExceptionAbstract;

class ValidatorException extends ExceptionAbstract
{
    protected function getExceptionCategory()
    {
        return ExceptionEnums::VALIDATOR;
    }

    protected function getErrorStatusCode()
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
