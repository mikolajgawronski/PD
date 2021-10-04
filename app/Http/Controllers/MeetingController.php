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

        return view("meetings.index", [
            "meetings" => $meetings,
        ]);
    }

    public function create(): View
    {
        return view("meetings.create");
    }

    public function store(Request $request)
    {
        $meeting = new Meeting();
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->save();

        return redirect("/meetings")->with("message", "Pomyślnie dodano spotkanie.");
    }

    public function destroy($id)
    {
        Meeting::query()->findOrFail($id)->delete();

        return redirect("/meetings")->with("message", "Pomyślnie usunięto spotkanie.");
    }
}
