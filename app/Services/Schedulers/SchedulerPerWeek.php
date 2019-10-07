<?php

namespace App\Services\Schedulers;

use App\Contracts\Scheduler\SchedulerInterface;
use App\Entity\Request\SchedulerRequest;

class SchedulerPerWeek implements SchedulerInterface
{
    private $request;

    public function __construct(SchedulerRequest $request)
    {
        $this->request = $request;
    }

    public function schedule(int $chapters) :array
    {
        $weekDays = $this->request->getWeekDays();
        $totalSessions = $this->request->getSessions() * $chapters;
        $totalWeeks = $totalSessions / count($weekDays);

        $schedule = [];
        sort($weekDays);

        $startingDate = $this->request->getStartingDate();

        $startingDate->locale('ar');

        for ($i = 0; $i < $totalWeeks; $i++) {
            foreach ($weekDays as $day) {
                $weekStart = $startingDate->startOfWeek()->format('Y-m-d');
                $weekEnd = $startingDate->endOfWeek()->format('Y-m-d');
                $weekID = sprintf('%s - %s', $weekStart, $weekEnd);
                $day = $startingDate->weekday($day);
                $dayAsString = $day->format('l');
                $schedule[$weekID][$dayAsString] = $day->format('Y-m-d');
            }
            $startingDate->addWeek();
        }

        return $schedule;
    }
}
