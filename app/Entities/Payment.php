<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class Payment extends EntityAbstract
{
    /** @var Transaction $transactionRelation */

    public const ID = 'id';
    public const ENTITY_TYPE = 'entity_type';
    public const ENTITY_ID = 'entity_id';
    public const PAID_AT = 'paid_At';

    public const CREATED_BY = 'created_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT,
    ];

    public static function tn()
    {
        return 'payment';
    }
}
