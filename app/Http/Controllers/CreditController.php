<?php

namespace App\Http\Controllers;

use Infrastructure\Abstracts\ControllerAbstract;
use Infrastructure\Repositories\CreditRepositoryInterface;

class CreditController extends ControllerAbstract
{
    public function __construct(CreditRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
