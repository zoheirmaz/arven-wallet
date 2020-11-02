<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class Enumeration extends EntityAbstract
{
    /** @var Enumeration $childrenRelation */
    /** @var Enumeration $parentRelation */

    public const ID = 'id';
    public const TITLE = 'title';
    public const PARENT_ID = 'parent_id';

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::ID,
        self::TITLE,
        self::PARENT_ID,
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
        return 'enumerations';
    }

    public function childrenRelation()
    {
        return $this->hasMany(self::class, self::PARENT_ID, self::ID);
    }

    public function parentRelation()
    {
        return $this->belongsTo(self::class, self::PARENT_ID, self::ID);
    }
}
