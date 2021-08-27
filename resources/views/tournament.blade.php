@extends("master")
@section("tournament")
    <div class="table-responsive">

        <h1>{{$tournament[0]["name"]}}</h1>
        <h5>{{$tournament[0]["description"]}}</h5>
        <br>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Data i Godzina</th>
                <th scope="col">Zapisani gracze</th>
                <th scope="col">Maksymalna ilość graczy</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ \App\Models\Game::query()->where("id",$tournament[0]['game_id'])->value("name")}}</td>
                    <td>{{ $tournament[0]['play_date'] }}</td>
                    <td>{{ $tournament[0]['current_players'] }}</td>
                    <td>{{ $tournament[0]['max_players'] }}</td>
                    <td><a class="btn btn-success">Dołącz</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
