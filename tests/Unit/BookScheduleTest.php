<?php

namespace Tests\Unit;

use App\Entity\Request\SchedulerRequest;
use App\Services\BookSchedulerService;
use Carbon\Carbon;
use Tests\TestCase;

class BookScheduleTest extends TestCase
{
    public function testOneDayPerWeekScheduleCase()
    {
        $scheduleRequest = new SchedulerRequest();
        $scheduleRequest->setStartingDate((new Carbon)->parse('2019-10-01 00:00:00'));
        $scheduleRequest->setWeekDays([1]);
        $scheduleRequest->setSessions(1);

        $bookScheduleService = new BookSchedulerService();
        $schedule = $bookScheduleService->schedule(BookSchedulerService::SCHEDULE_PER_WEEK, $scheduleRequest);
        $this->assertEquals(30, count($schedule));
    }
}
