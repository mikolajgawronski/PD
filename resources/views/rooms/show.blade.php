@extends("master")
@section("post")

        <h1>{{$game}}</h1>
        <h3>Rozpoczęcie rozgrywki o: {{$room[0]["time"]}} {{$date}}</h3>
        <br>
        <br>
        <h3>Zapisani gracze ({{$room[0]["current_players"]}}/{{$room[0]["max_players"]}}):</h3>
    @foreach($players as $player)
        <h4>- {{\App\Models\User::query()->where("id", $player["user_id"])->value("username")}}</h4>
    @endforeach
@stop
