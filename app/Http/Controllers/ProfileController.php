<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\PlayerList;
use App\Models\Rental;
use App\Models\TournamentAttendant;
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
        //player_lists potem to wyświetlić ifami poprawnie i funkcjonalność będzie zrobiona
        //no i dorobić aby przy tworzeniu pokoju dodawaly sie poprawnie rekordy itd

        return view("home", [
            "rentals" => $rentals,
            "attendants" => $attendants,
            "id" => $userId,
            "rooms" => $rooms,
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
}
