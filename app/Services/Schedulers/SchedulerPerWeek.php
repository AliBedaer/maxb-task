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

        $startingDate = $this->request->getStartingDate();

        $startingDate->locale('ar');

        foreach ($weekDays as $day) {
            $schedule[$startingDate->startOfWeek()->format('Y-m-d') . ' - ' .$startingDate->endOfWeek()->format('Y-m-d')][$startingDate->weekday($day)->format('l')] = $startingDate->weekday($day)->format('Y-m-d');
        }

        for ($i = 0; $i < $totalWeeks; $i++) {
            foreach ($this->request->getWeekDays() as $day) {
                $weekStart = $startingDate->startOfWeek()->format('Y-m-d');
                $weekEnd = $startingDate->endOfWeek()->format('Y-m-d');
                $weekID = sprintf('%s - %s', $weekStart, $weekEnd);
                $day = $startingDate->weekday($day);
                $dayAsString = $day->format('l');
                $schedule[$weekID][$dayAsString] = $day->format('Y-m-d');            }
            $startingDate->addWeek();
        }

        return $schedule;
    }
}
