<?php

namespace Infrastructure\Abstracts;

abstract class EnumAbstract
{
    abstract public static function getEnumId($enumType);

    abstract public static function getEnumResource($enumId);
}
