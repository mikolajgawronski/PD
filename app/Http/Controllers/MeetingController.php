<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        $meetings = Meeting::query()->whereDate("date", ">=", Carbon::now())->get();
        $carbon = new Carbon();

        return view("meetings.index", [
            "meetings" => $meetings,
            "carbon" => $carbon,
        ]);
    }

    public function create(): View
    {
        return view("meetings.create");
    }

    public function store(MeetingRequest $request)
    {
        $meeting = new Meeting();
        $meeting->date = $request->date;
        $meeting->start_time = $request->start_time;
        $meeting->end_time = $request->end_time;
        $meeting->save();

        return redirect("/meetings")->with("message", "Pomyślnie dodano spotkanie.");
    }

    public function destroy($id)
    {
        Meeting::query()->findOrFail($id)->delete();

        return redirect("/meetings")->with("message", "Pomyślnie usunięto spotkanie.");
    }
}
