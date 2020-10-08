<?php

namespace Infrastructure\Abstracts;

use Illuminate\Contracts\Queue\ShouldQueue;

abstract class ListenerQueueAbstract extends ListenerAbstract implements ShouldQueue
{
    public $queue;

    public $connection;

    abstract function __construct();
}