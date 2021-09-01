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

$router->get("/meetings", [MeetingController::class, "index"]);
$router->get("/meetings/{id}", [RoomController::class, "index"]);
//$router->post("/meetings", [MeetingController::class, "create"]);

$router->get("/games", [GameController::class, "index"]);
$router->get("/games/{id}", [GameController::class, "show"]);

$router->get("/tournaments", [TournamentController::class, "index"]);
$router->get("/tournaments/{id}", [TournamentController::class, "show"]);
