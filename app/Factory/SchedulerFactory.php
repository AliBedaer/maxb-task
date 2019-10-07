<?php

namespace App\Factory;

use App\Contracts\Scheduler\SchedulerInterface;
use App\Entity\Request\SchedulerRequest;
use App\Services\Schedulers\SchedulerPerWeek;

class SchedulerFactory
{
    public static function create($type, SchedulerRequest $request) : SchedulerInterface
    {
        switch ($type) {
            case 'per_week':
                return new SchedulerPerWeek($request);
                break;

            default:
                throw new Exception(sprintf("Unsupported Scheduler Type %s", $type));
                break;
        }
    }
}
