<?php

namespace App\Entity\Request;

use Carbon\Carbon;

class SchedulerRequest
{
    /**
     * @var Carbon $startingDate
     */
    private $startingDate;

    /**
     * @var Array<int> $weekDays
     */
    private $weekDays;

    /**
     * @var int $sessions
     */
    private $sessions;

    public function setStartingDate(Carbon $date)
    {
        $this->startingDate = $date;
    }

    public function getStartingDate(): Carbon
    {
        return $this->startingDate;
    }

    public function setWeekDays(array $days)
    {
        $this->weekDays = $days;
    }

    public function getWeekDays(): array
    {
        return $this->weekDays;
    }

    public function setSessions(int $total)
    {
        $this->sessions = $total;
    }

    public function getSessions(): int
    {
        return $this->sessions;
    }
}
