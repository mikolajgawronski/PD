<?php

declare(strict_types=1);

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TournamentController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app()->make(Router::class);

$router->get("/", fn() => view("welcome"));

Auth::routes();

$router->get("/home", [HomeController::class, "index"])->name("home");

$router->prefix("add")->group(function (Router $router): void {
    $router->get("room", [RoomController::class, "create"]);
    $router->post("room", [RoomController::class, "store"])->name("store.room");

    $router->get("meeting", [MeetingController::class, "create"]);
    $router->post("meeting", [MeetingController::class, "store"])->name("store.meeting");

    $router->get("game", [GameController::class, "create"]);
    $router->post("game", [GameController::class, "store"])->name("store.game");

    $router->get("tournament", [TournamentController::class, "create"]);
    $router->post("tournament", [TournamentController::class, "store"])->name("store.tournament");
});

$router->prefix("meetings")->group(function (Router $router): void {
    $router->get("", [MeetingController::class, "index"]);
    $router->get("/{id}", [RoomController::class, "index"]);
});

$router->prefix("games")->group(function (Router $router): void {
    $router->get("", [GameController::class, "index"]);
    $router->get("{id}", [GameController::class, "show"]);
});

$router->prefix("tournaments")->group(function (Router $router): void {
    $router->get("", [TournamentController::class, "index"]);
    $router->get("{id}", [TournamentController::class, "show"]);
});
