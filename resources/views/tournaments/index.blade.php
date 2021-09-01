@extends("master")
@section("tournaments")
    <h3>Najbliższe turnieje:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Gra</th>
                <th scope="col">Data i Godzina</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tournaments as $tournament)
                <tr>
                    <td>{{ $tournament['name'] }}</td>
                    <td>{{ $tournament['description'] }}</td>
                    <td>{{ \App\Models\Game::query()->where("id",$tournament['game_id'])->value("name")}}</td>
                    <td>{{ $tournament['play_date'] }}</td>
                    <td><a class="btn btn-primary" href={{url("tournaments",$tournament->id)}}>Więcej</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
