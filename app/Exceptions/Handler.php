<?php

namespace App\Exceptions;

use Throwable;
use Infrastructure\Enums\HeaderEnums;
use Infrastructure\Traits\ExceptionTrait;
use Infrastructure\Exceptions\ValidatorException;
use Infrastructure\Exceptions\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Infrastructure\Exceptions\AuthorizationException as AuthorizeException;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->hasHeader(HeaderEnums::X_LOG_EXCEPTION)) {
            return $this->logHeaderRender($exception);
        }

        if ($exception instanceof ValidatorException) {
            return $this->validationRender($exception);
        }

        if ($exception instanceof AuthorizeException) {
            return $this->authorizationRender($exception);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->authenticationRender($exception);
        }

        return $this->internalRender($request, $exception);
    }
}
