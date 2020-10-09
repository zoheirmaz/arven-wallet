<?php

namespace App\Http\Controllers\Test;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Infrastructure\Abstracts\ControllerAbstract;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Test extends ControllerAbstract
{
    protected function test()
    {
        dd('Hello world!');
    }
}
