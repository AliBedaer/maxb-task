<?php

namespace App\Services;

use App\Entity\Request\SchedulerRequest;
use App\Factory\SchedulerFactory;

class BookSchedulerService
{
    const BOOK_CHAPTERS = 30;
    const SCHEDULE_PER_WEEK = 'per_week';

    const SCHEDULE_TYPES = [
        self::SCHEDULE_PER_WEEK,
    ];

    public function schedule($scheduleType, SchedulerRequest $request)
    {
        $scheduler = SchedulerFactory::create($scheduleType, $request);
        $days = $scheduler->schedule(self::BOOK_CHAPTERS);

        return $days;
    }
}
