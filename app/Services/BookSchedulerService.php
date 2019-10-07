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

    public function schedule($scheduleType, SchedulerRequest $request, int $chapterCount = self::BOOK_CHAPTERS)
    {
        if(!in_array($scheduleType,self::SCHEDULE_TYPES)){
            throw new Exception("invalid schedule type");
        }

        $scheduler = SchedulerFactory::create($scheduleType, $request);
        $days = $scheduler->schedule($chapterCount);

        return $days;
    }
}
