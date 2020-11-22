<?php

namespace Infrastructure\Traits;


trait QueryTrait
{
    public function appendSizeFilterQuery($query, $filter)
    {
        return $query
            ->offset($filter['offset'] ?? 0)
            ->limit($filter['size'] ?? 20);
    }

    public function sortQuery($query, $sort)
    {
        return $query->orderBy($sort['item'], $sort['type']);
    }
}
