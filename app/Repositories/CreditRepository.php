<?php

namespace App\Repositories;

use App\Entities\Credit;
use Infrastructure\Traits\QueryTrait;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\CreditRepositoryInterface;

class CreditRepository implements CreditRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    public function charge($data)
    {
        return Credit::create([
            Credit::AMOUNT => $data['amount'],
            Credit::REMINDED_AMOUNT => $data['amount'],
            Credit::USER_ID => $data['mobile'],
            Credit::USED_COUNT => 0,
            Credit::REFERENCE_ID => 0,
            Credit::REFERENCE_TYPE => 0,
            Credit::DESCRIPTION => 'شارژ اعتبار توسط کاربر',
            Credit::CREATED_BY => $data['mobile'],
        ]);
    }

    public function getCreditByCoupon($input)
    {
        $credit = coupon_request_service(
            $input['mobile'],
            $input['coupon_id']
        )->outputCredit($input);

        return Credit::create($credit);
    }

    public function getUserCreditAmount($mobile)
    {
        return Credit::query()->where(
            Credit::USER_ID,
            $mobile
        )->whereNull(
            Credit::DELETED_AT
        )->sum(Credit::REMINDED_AMOUNT);
    }
}
