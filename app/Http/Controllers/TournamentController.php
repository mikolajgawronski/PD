<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentController extends Controller
{
    public function index(): View
    {
        return view("tournaments");
    }

    public function create(): void
    {
        //
    }

    public function store(Request $request): void
    {
        //
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
