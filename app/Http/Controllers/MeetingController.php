<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        $meetings = Meeting::query()->whereDate("date", ">=", Carbon::now())->get();

        return view("meetings", [
            "meetings" => $meetings,
        ]);
    }

    public function create(Request $request): void
    {
        $meeting = new Meeting();
        $meeting->time = $request->time;
        $meeting->save();
    }

    public function destroy($id): void
    {
        //
    }
}
