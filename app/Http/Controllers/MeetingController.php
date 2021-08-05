<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        $meetings = Meeting::query()->get();

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
