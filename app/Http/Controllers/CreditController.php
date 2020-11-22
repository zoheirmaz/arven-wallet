<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CreditResource;
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
}
