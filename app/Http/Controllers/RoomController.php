<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Game;
use App\Models\Meeting;
use App\Models\PlayerList;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index($id): View
    {
        $carbon = new Carbon();
        $rooms = Room::query()->where("meeting_id", $id)->get();

        $meetingDate = Meeting::query()->where("id", $id)->value("date");
        $meetingDate = $carbon->parse($meetingDate)->format("d.m.Y");

        return view("rooms.index", [
            "rooms" => $rooms,
            "carbon" => $carbon,
            "meeting_date" => $meetingDate,
        ]);
    }

    public function create(): View
    {
        $games = Game::query()->orderBy("name")->get();
        $meetings = Meeting::query()->orderBy("date")->get();

        return view("rooms.create", [
            "games" => $games,
            "meetings" => $meetings,
        ]);
    }

    public function store(RoomRequest $request)
    {
        $room = new Room();
        $room->game_id = $request->game_id;
        $room->meeting_id = $request->meeting_id;
        $room->current_players = 1;
        $room->max_players = Game::query()->where("id", $request->game_id)->value("max_players");
        $room->time = $request->time;
        $room->save();

        $list = new PlayerList();
        $list->user_id = Auth::user()->id;
        $list->room_id = $room->id;
        $list->save();

        return redirect("/meetings/{$request->meeting_id}")->with("message", "Pomyślnie dodano pokój.");
    }

    public function show($id): View
    {
        $carbon = new Carbon();
        $room = Room::query()->findOrFail($id);
        $game = Game::query()->where("id", $room->game_id)->value("name");
        $players = PlayerList::query()->where("room_id", $id)->get();

        $date = Meeting::query()->where("id", $room->meeting_id)->value("date");
        $date = $carbon->parse($date)->format("d.m.Y");
        $time = $carbon->parse($room->time)->format("H:i");

        return view("rooms.show", [
            "room" => $room,
            "game" => $game,
            "players" => $players,
            "date" => $date,
            "time" => $time,
        ]);
    }

    public function edit($id): void
    {
        //
    }

    public function update(Request $request, $id): void
    {
        //
    }

    public function destroy($id): void
    {
        //
    }

    public function join($id)
    {
        $meetingId = Room::query()->findOrFail($id)->value("meeting_id");

        $room = Room::query()->findOrFail($id);
        $room->current_players++;
        $room->save();

        $list = new PlayerList();
        $list->user_id = Auth::user()->id;
        $list->room_id = $id;
        $list->save();

        return redirect("/meetings/${meetingId}")->with("message", "Pomyślnie dołączono do pokoju.");
    }
}
