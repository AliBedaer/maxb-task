<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookScheduleRequest;
use Illuminate\Support\Carbon;
use App\Services\BookSchedulerService;
use App\Entity\Request\SchedulerRequest;

class BooksManagerController extends Controller
{

    public function scheduleBook(BookScheduleRequest $request, BookSchedulerService $scheduleService)
    {
        $scheduleRequest = new SchedulerRequest();
        $scheduleRequest->setStartingDate(Carbon::parse($request->starting_date));
        $scheduleRequest->setWeekDays($request->days_in_week);
        $scheduleRequest->setSessions($request->required_sessions);

        return $scheduleService->schedule(BookSchedulerService::SCHEDULE_PER_WEEK, $scheduleRequest);
    }


}
