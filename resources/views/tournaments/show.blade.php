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
                <th scope="col">Zapisani Gracze</th>
                <th scope="col">Maksymalna Ilość Graczy</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ \App\Models\Game::query()->where("id",$tournament[0]['game_id'])->value("name")}}</td>
                    <td>{{ $tournament[0]['current_players']}}</td>
                    <td>{{ $tournament[0]['max_players']}}</td>
                    <td>{{ $tournament[0]['date'] }}</td>
                    <td>{{ $tournament[0]['time'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
