<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CreditCollection extends ResourceCollection
{
    public $collects = CreditResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param $data
     * @return array
     */
    public function toArray($data)
    {
        return [
            'results' => $this->collection,
            'resultCount' => $this->collection->count(),
            'totalCount' => $this->additional['totalCount'],
        ];
    }
}
