<?php

namespace Infrastructure\Repositories;

interface CreditRepositoryInterface
{
    public function charge($data);

    public function getCreditByCoupon($input);

    public function getUserCreditAmount($mobile);

    public function getUserCredits($mobile);
}
