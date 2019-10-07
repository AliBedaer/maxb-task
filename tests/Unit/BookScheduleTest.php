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

    public function testScheduleReturnsValidDate()
    {
        $scheduleRequest = new SchedulerRequest();
        $scheduleRequest->setStartingDate((new Carbon)->parse('2019-10-01 00:00:00'));
        $scheduleRequest->setWeekDays([1]);
        $scheduleRequest->setSessions(1);
        $expected_schedule = [
            "2019-09-28 - 2019-10-04" =>  [
              "Sunday" => "2019-09-29"
            ]
        ];
        $bookScheduleService = new BookSchedulerService();
        $schedule = $bookScheduleService->schedule(BookSchedulerService::SCHEDULE_PER_WEEK, $scheduleRequest,1);
        $this->assertEquals(1, count($schedule));
        $this->assertEquals($expected_schedule,$schedule);
    }
}
