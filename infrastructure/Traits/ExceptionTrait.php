<?php

namespace Infrastructure\Traits;

use Illuminate\Http\Response;
use Infrastructure\Enums\ExceptionEnums;

trait ExceptionTrait
{
    protected function validationRender($exception)
    {
        return response()->json([
            'error' => [
                'type' => ExceptionEnums::VALIDATOR,
                'messages' => $this->getValidationMessage($exception->getMessage())
            ]
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    protected function authorizationRender($exception)
    {
        return response()->json([
            'error' => [
                'type' => ExceptionEnums::AUTHORIZATION,
                'messages' => [
                    [
                        'text' => $exception->getMessage()
                    ]
                ]
            ]
        ], Response::HTTP_FORBIDDEN);
    }

    protected function authenticationRender($exception)
    {
        return response()->json([
            'error' => [
                'type' => ExceptionEnums::AUTHENTICATION,
                'messages' => [
                    [
                        'text' => $exception->getMessage()
                    ]
                ]
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }


    protected function internalRender($request, $exception)
    {
        return response()->json([
            'error' => [
                'type' => ExceptionEnums::INTERNAL,
                'messages' => [
                    [
                        'text' => $exception->getMessage()
                    ]
                ],
            ]
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function logHeaderRender($exception)
    {
        return response()->json([
            'error' => [
                'type' => ExceptionEnums::INTERNAL,
                'messages' => [
                    [
                        'text' => $exception->getMessage()
                    ]
                ],
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString()
            ]
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    private function getValidationMessage($errors)
    {
        $data = [];
        $index = 0;

        foreach (json_decode($errors) as $key => $error) {
            $data[$index] = [];
            $error = collect($error);
            $data[$index]['title'] = $key;
            $data[$index]['text'] = $error->values()[0];
            $index++;
        };

        return $data;
    }

}
