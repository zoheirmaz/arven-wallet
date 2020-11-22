<?php

namespace Infrastructure\Traits;

trait EntityRelationsTrait
{
    public function stockRelations()
    {
        return [
            'categoryRelation',
        ];
    }

    public function enumerationRelations()
    {
        return [
            'parentRelation',
        ];
    }

    public function couponRelations()
    {
        return [

        ];
    }
}
