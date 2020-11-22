<?php

namespace Infrastructure\Abstracts;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Infrastructure\Enums\HeaderEnums;
use Illuminate\Support\Facades\Validator;
use Infrastructure\Exceptions\InternalException;
use Infrastructure\Exceptions\ValidatorException;
use Infrastructure\Exceptions\AuthorizationException;

abstract class ControllerAbstract extends Controller
{
    /**
     * @param $name
     * @param $arguments
     * @return array|void
     * @throws \Exception
     */
    public function callAction($name, $arguments)
    {
        $this->checkMethodIsExists($name);

        $this->checkValidation($name, $arguments);
        $this->checkPolicy($name, $arguments);

        $result = call_user_func_array([$this, $name], $arguments);
        $this->checkLogQuery();

        return ['data' => $result];
    }

    private function fetchRequestInputs($methodName, $arguments)
    {
        $methodArgumentsNames = $this->get_func_arg_names($this, $methodName);
        $inputs = array_slice($methodArgumentsNames, 1);
        $getMethodArguments = array_slice($arguments, 1);

        $data = [];

        foreach ($inputs as $index => $key) {
            $data[$key] = $getMethodArguments[$index];
        }

        $postInputs = $arguments[0]->all();

        return array_merge($data, $postInputs);
    }

    /**
     * @param $methodName
     * @param $arguments
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    private function checkValidation($methodName, $arguments)
    {
        $controllerPath = substr(get_class($this), 0, -10);

        $validationPath = str_replace(
            config('app.infrastructure.controller_directory_name'),
            config('app.infrastructure.validation_directory_name'),
            $controllerPath
        );

        $validationPath = $validationPath . '\\' . ucfirst($methodName);

        if (!class_exists($validationPath)) {
            throw new \Exception("class `{$validationPath}` not  exists!!!");
        }

        $validationClass = new $validationPath();

        $validator = Validator::make(
            request()->all(),
            $validationClass->rules(),
            $validationClass->messages()
        );

        if ($validator->fails()) {
            throw new ValidatorException(collect($validator->errors()));
        }
    }

    /**
     * @param $methodName
     * @param $arguments
     * @return mixed
     * @throws \Exception
     */
    private function checkPolicy($methodName, $arguments)
    {
        $controllerPath = substr(get_class($this), 0, -10);
        $policyPath = str_replace(
            config('app.infrastructure.controller_directory_name'),
            config('app.infrastructure.policy_directory_name'),
            $controllerPath
        );

        if (!class_exists($policyPath)) {
            throw new InternalException("class `{$policyPath}` not  exists!!!");
        }

        $policyClass = new $policyPath();

        if (!method_exists($policyPath, $methodName)) {
            throw new InternalException("method not exists in `{$policyPath}` class!!!");
        }
        $inputs = $this->fetchRequestInputs($methodName, $arguments);

        if (!$policyClass->$methodName($inputs)) {
            throw new AuthorizationException($policyClass->message);
        }
    }

    /**
     * @param $className
     * @param $funcName
     * @return array
     */
    private function get_func_arg_names($className, $funcName)
    {
        $result = [];

        try {
            $f = new \ReflectionMethod($className, $funcName);

            foreach ($f->getParameters() as $param) {
                $result[] = $param->name;
            }

        } catch (\ReflectionException $e) {}

        return $result;
    }

    /**
     * @param $methodName
     * @throws \Exception
     */
    private function checkMethodIsExists($methodName)
    {
        if (!method_exists($this, $methodName)) {
            throw new \Exception("method {$methodName} does not exists!!!");
        }
    }


    private function checkLogQuery()
    {
        if (
            (app()->environment() == 'development')
            && request()->hasHeader(HeaderEnums::X_LOG_QUERY)
        ) {
            dump([
                "count" => $GLOBALS['queryCount'],
                "queries" => DB::connection()->getQueryLog()
            ]);
            exit();
        }
    }
}
