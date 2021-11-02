<?php

declare(strict_types=1);

use App\Http\Controllers\GameController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TournamentController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app()->make(Router::class);

$router->get("/", fn() => view("welcome"));
$router->get("/about", fn() => view("about"));

Auth::routes();

$router->get("/home", [ProfileController::class, "index"])->name("home");
$router->post("/home/rental/{id}", [ProfileController::class, "deleteRental"])->name("delete.rental");
$router->post("/home/attendance/{id}", [ProfileController::class, "cancelAttendance"])->name("cancel.attendance");
$router->post("/home/room/{id}", [ProfileController::class, "cancelPlaying"])->name("cancel.playing");

$router->prefix("add")->group(function (Router $router): void {
    $router->get("room", [RoomController::class, "create"]);
    $router->post("room", [RoomController::class, "store"])->name("store.room");

    $router->get("meeting", [MeetingController::class, "create"]);
    $router->post("meeting", [MeetingController::class, "store"])->name("store.meeting");

    $router->get("game", [GameController::class, "create"]);
    $router->post("game", [GameController::class, "store"])->name("store.game");

    $router->get("post", [PostController::class, "create"]);
    $router->post("post", [PostController::class, "store"])->name("store.post");

    $router->get("tournament", [TournamentController::class, "create"]);
    $router->post("tournament", [TournamentController::class, "store"])->name("store.tournament");
});

$router->prefix("meetings")->group(function (Router $router): void {
    $router->get("", [MeetingController::class, "index"]);
    $router->get("/{id}", [RoomController::class, "index"]);
    $router->post("{id}", [MeetingController::class, "destroy"])->name("delete.meeting");
    $router->post("join/{id}", [RoomController::class, "join"])->name("join.room");
});

$router->prefix("games")->group(function (Router $router): void {
    $router->get("", [GameController::class, "index"]);
    $router->get("{id}", [GameController::class, "show"]);
    $router->post("{id}", [GameController::class, "destroy"])->name("delete.game");
    $router->post("borrow/{id}", [GameController::class, "borrow"])->name("borrow.game");
});

$router->prefix("tournaments")->group(function (Router $router): void {
    $router->get("", [TournamentController::class, "index"]);
    $router->get("{id}", [TournamentController::class, "show"]);
    $router->post("{id}", [TournamentController::class, "destroy"])->name("delete.tournament");
    $router->post("join/{id}", [TournamentController::class, "join"])->name("join.tournament");
});

$router->prefix("posts")->group(function (Router $router): void {
    $router->get("", [PostController::class, "index"]);
    $router->get("{id}", [PostController::class, "show"]);
});
