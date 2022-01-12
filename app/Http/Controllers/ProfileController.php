<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\PlayerList;
use App\Models\Rental;
use App\Models\Room;
use App\Models\Tournament;
use App\Models\TournamentAttendant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->id;
        $rentals = Rental::query()->where("user_id", $userId)->get();
        $attendants = TournamentAttendant::query()->where("user_id", $userId)->get();
        $rooms = PlayerList::query()->where("user_id", $userId)->get();
        $adminRentals = Rental::query()->get();
        $carbon = new Carbon();

        return view("home", [
            "rentals" => $rentals,
            "attendants" => $attendants,
            "id" => $userId,
            "rooms" => $rooms,
            "adminRentals" => $adminRentals,
            "carbon" => $carbon,
        ]);
    }

    public function create(): View
    {
        return view("games.create");
    }

    public function store(GameRequest $request)
    {
        $rental = new Rental();
        $rental->name = $request->name;
        $rental->description = $request->description;
        $rental->save();

        return redirect("/games")->with("message", "Pomyślnie dodano grę.");
    }

    public function show($id): View
    {
        $game = Game::query()->findOrFail($id)->get();

        return view("games.show", [
            "game" => $game,
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

    public function destroy($id)
    {
        Game::query()->findOrFail($id)->delete();

        return redirect("/games")->with("message", "Pomyślnie usunięto grę.");
    }

    public function deleteRental($id)
    {
        $rental = Rental::query()->findOrFail($id);
        $game = Game::query()->findOrFail($rental["game_id"]);

        $game->available = true;
        $game->save();

        $rental->delete();

        return redirect("/home")->with("message", "Pomyślnie anulowano wypożyczenie.");
    }

    public function cancelAttendance($id)
    {
        $attendant = TournamentAttendant::query()->findOrFail($id);
        $tournament = Tournament::query()->findOrFail($attendant["tournament_id"]);

        $tournament->current_players--;
        $tournament->save();

        $attendant->delete();

        return redirect("/home")->with("message", "Pomyślnie anulowano uczestnictwo w turnieju.");
    }

    public function cancelPlaying($id)
    {
        $list = PlayerList::query()->findOrFail($id);
        $room = Room::query()->findOrFail($list["room_id"]);

        $room->current_players--;
        $room->save();

        $list->delete();

        return redirect("/home")->with("message", "Pomyślnie wypisano się z pokoju.");
    }

    public function rentGame($id)
    {
        $carbon = new Carbon();

        $rental = Rental::query()->findOrFail($id);
        $rental->approved = true;
        $rental->rented_until = $carbon->next("saturday")->addWeek();
        $rental->save();

        return redirect("/home")->with("message", "Pomyślnie zatwierdzono wypożyczenie.");
    }
}
