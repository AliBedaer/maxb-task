<?php

namespace App\Contracts\Scheduler;

interface SchedulerInterface{
    public function schedule(int $chapters) : array;
}
