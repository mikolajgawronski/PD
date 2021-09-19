<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Meeting;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index($id): View
    {
        $rooms = Room::query()->where("meeting_id", $id)->get();

        return view("rooms.index", [
            "rooms" => $rooms,
            "meeting_id" => $id,
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

    public function store(Request $request): void
    {
        $room = new Room();
        $room->game_id = $request->game_id;
        $room->meeting_id = $request->meeting_id;
        $room->current_players = 1;
        $room->max_players = Game::query()->where("id", $request->game_id)->value("max_players");
        $room->time = $request->time;
        $room->save();
    }

    public function show($id): void
    {
        //
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
}
