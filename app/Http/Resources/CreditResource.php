<?php

namespace App\Http\Resources;

use App\Entities\Credit;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->{Credit::ID},
            'user_id' => $this->{Credit::USER_ID},
            'amount' => $this->{Credit::AMOUNT},
            'reminded_amount' => $this->{Credit::REMINDED_AMOUNT},
            'description' => $this->{Credit::DESCRIPTION},
            'used_count' => $this->{Credit::USED_COUNT},
            'expired_at' => $this->{Credit::EXPIRED_AT},
            'created_at' => $this->{Credit::CREATED_AT},
        ];
    }
}
