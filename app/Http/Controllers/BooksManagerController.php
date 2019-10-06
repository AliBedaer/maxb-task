<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookScheduleRequest;
use Illuminate\Support\Carbon;
use App\Services\BookSchedulerService;

class BooksManagerController extends Controller
{

    public function scheduleBook(BookScheduleRequest $request)
    {
        $bookScheduleService = new BookSchedulerService();
        return $bookScheduleService->schedule(BookSchedulerService::SCHEDULE_PER_WEEK,$request);
    }


}
