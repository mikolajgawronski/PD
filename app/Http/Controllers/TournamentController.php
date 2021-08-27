<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentController extends Controller
{
    public function index(): View
    {
        $tournaments = Tournament::query()->get();

        return view("tournaments", [
            "tournaments" => $tournaments,
        ]);
    }

    public function create(): void
    {
        //
    }

    public function store(Request $request): void
    {
        //
    }

    public function show($id): View
    {
        $tournament = Tournament::query()->findOrFail($id)->get();

        return view("tournament", [
            "tournament" => $tournament,
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
}
