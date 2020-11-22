<?php

namespace App\Repositories;

use Infrastructure\Traits\QueryTrait;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\CreditRepositoryInterface;

class CreditRepository implements CreditRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    //
}
