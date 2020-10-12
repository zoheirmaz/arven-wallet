<?php

namespace Infrastructure\Abstracts;

abstract class ValidationAbstract
{
    abstract public function rules(): array;

    abstract public function messages(): array;
}