@extends("master")
@section("rooms")
    <div class="table-responsive">

        <h1>Pokoje gier:</h1>
        <h5>{{\App\Models\Meeting::query()->where("id",$meeting_id)->value("date")}}</h5>
        <br>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Data i Godzina</th>
                <th scope="col">Zapisani gracze</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ \App\Models\Game::query()->where("id",$room['game_id'])->value("name")}}</td>
                    <td>{{ $room['play_date'] }}</td>
                    <td>{{ $room['current_players'] }} / {{ $room['max_players'] }}</td>
                    <td><a class="btn btn-success">Dołącz</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
