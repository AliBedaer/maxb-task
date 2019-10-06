<?php

namespace App\Services\Schedulers;

use App\Entity\Request\SchedulerRequest;

class SchedulerPerWeek
{
    private $request;

    public function __construct(SchedulerRequest $request)
    {
        $this->request = $request;
    }

    public function schedule(int $chapters)
    {
        $totalSessions = $this->request->getSessions() * $chapters;
        $totalWeeks = $totalSessions / count($this->request->getWeekDays());

        $schedule = [];
        $weekDays = $this->request->getWeekDays();
        sort($weekDays);
        $newWeek = $this->request->getStartingDate();
        for ($i = 0; $i < $totalWeeks; $i++) {
            foreach ($this->request->getWeekDays() as $day) {
                $weekStart = $this->request->getStartingDate()->startOfWeek()->format('Y-m-d');
                $weekEnd = $this->request->getStartingDate()->endOfWeek()->format('Y-m-d');
                $weekID = sprintf('%s-%s', $weekStart, $weekEnd);
                $day = $this->request->getStartingDate()->weekday($day);
                $dayAsString = $day->format('l');
                $schedule[$weekID][$dayAsString] = $day->format('Y-m-d');
            }
            $newWeek = $newWeek->addWeek();
        }

        return $schedule;
    }
}
