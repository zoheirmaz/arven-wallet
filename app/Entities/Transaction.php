<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class Transaction extends EntityAbstract
{
    /** @var Enumeration $gatewayRelation */

    public const ID = 'id';
    public const STATUS = 'status';
    public const GATEWAY = 'gateway';
    public const PAID_AT = 'paid_at';
    public const PAYMENT_ID = 'payment_id';
    public const REFERENCE_ID = 'reference_id';
    public const GATEWAY_STATUS = 'gateway_status';
    public const TRANSACTION_ID = 'transaction_id';

    public const CREATED_BY = 'created_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::STATUS,
        self::GATEWAY,
        self::PAYMENT_ID,
        self::CREATED_BY,
        self::TRANSACTION_ID,
    ];

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
        return 'transactions';
    }

    public function gatewayRelation()
    {
        return $this->hasOne(Enumeration::class, Enumeration::ID, self::GATEWAY);
    }
}
