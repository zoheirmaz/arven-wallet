<?php

namespace Infrastructure\Abstracts;

use Throwable;

/**
 * Class ExceptionAbstract
 *
 * @package Infrastructure\Abstracts
 */
abstract class ExceptionAbstract extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->category = $this->getExceptionCategory();

        parent::__construct($message, 0, $previous);
    }

    abstract protected function getExceptionCategory();

    abstract protected function getErrorStatusCode();

    /**
     * @var null|string
     */
    protected $category = null;

    /**
     * List of validation errors!
     *
     * @var array
     */
    private $errors = [];

    /**
     * Return the category of the exception.
     *
     * @return null|string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get error array.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get error array.
     *
     * @return array
     */
    public function getError()
    {
        return $this->errors[0];
    }
}
