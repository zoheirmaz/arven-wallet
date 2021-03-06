<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CreditResource;
use App\Http\Resources\CreditCollection;
use Infrastructure\Abstracts\ControllerAbstract;
use Infrastructure\Repositories\CreditRepositoryInterface;

class CreditController extends ControllerAbstract
{
    public function __construct(CreditRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function charge(Request $request)
    {
        $data = [
            'amount' => $request->input('amount'),
            'mobile' => $request->input('mobile'),
        ];

        $charge = $this->repository->charge($data);

        return new CreditResource($charge);
    }

    protected function getCreditByCoupon(Request $request)
    {
        $data = [
            'coupon_id' => $request->input('coupon_id'),
            'mobile' => $request->input('mobile'),
        ];

        $credit = $this->repository->getCreditByCoupon($data);

        return new CreditResource($credit);
    }

    protected function getUserCreditAmount(Request $request)
    {
        $amount = $this->repository->getUserCreditAmount($request->input('mobile'));

        return ['amount' => $amount];
    }

    protected function getUserCredits(Request $request)
    {
        $result = $this->repository->getUserCredits($request->input('mobile'));

        return (new CreditCollection($result['results']))->additional(
            ['totalCount' => $result['totalCount']]
        );
    }
}
