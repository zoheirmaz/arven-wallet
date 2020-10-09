<?php

namespace Infrastructure\Abstracts;

use Illuminate\Queue\SerializesModels;

abstract class EventAbstract
{
    use SerializesModels;
}
