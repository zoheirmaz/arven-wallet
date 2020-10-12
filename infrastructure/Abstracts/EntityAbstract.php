<?php

namespace Infrastructure\Abstracts;

use Illuminate\Database\Eloquent\Model;

abstract class EntityAbstract extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->table = static::tn();

        parent::__construct($attributes);
    }

    abstract public static function tn();

    public static function tfn($column = null)
    {
        if ($column == null) {
            $column = '*';
        }

        return static::tn() . ".{$column}";
    }
}
