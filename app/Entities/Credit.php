<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class Credit extends EntityAbstract
{
    /** @var User $userRelation */

    public const ID = 'id';

    public const USER_ID = 'user_id';
    public const EXPIRED_AT = 'expired_at';
    public const AMOUNT = 'amount';
    public const REMINDED_AMOUNT = 'reminded_amount';
    public const USED_COUNT = 'used_count';
    public const DESCRIPTION = 'description';
    public const REFERENCE_TYPE = 'reference_type';
    public const REFERENCE_ID = 'reference_id';

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';
    public const CREATED_BY = 'created_by';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::ID,
        self::USER_ID,
        self::EXPIRED_AT,
        self::AMOUNT,
        self::REMINDED_AMOUNT,
        self::USED_COUNT,
        self::DESCRIPTION,
        self::REFERENCE_TYPE,
        self::REFERENCE_ID,
        self::CREATED_BY
    ];

    protected $attributes = [
        self::REFERENCE_TYPE => 0,
        self::REFERENCE_ID => 0,
        self::USED_COUNT => 0,
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = [
        self::EXPIRED_AT,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT,
    ];

    public static function tn()
    {
        return 'credits';
    }

    public function userRelation()
    {
        return $this->belongsTo(
            User::class,
            User::ID,
            self::USER_ID
        );
    }
}
