@extends("master")
@section("post")

        <h1>{{$game}}</h1>
        <h3>Rozpoczęcie rozgrywki o: {{$time}}, {{$date}}</h3>
        <br>
        <br>
        <h3>Zapisani gracze ({{$room->current_players}}/{{$room->max_players}}):</h3>
    @foreach($players as $player)
        <h4>- {{\App\Models\User::query()->where("id", $player->user_id)->value("username")}}</h4>
    @endforeach
@stop
