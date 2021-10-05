@extends("master")
@section("tournaments")

    @include('message')

    <h3>Najbliższe turnieje:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Gra</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tournaments as $tournament)
                <tr>
                    <td>{{ $tournament['name'] }}</td>
                    <td>{{ \App\Models\Game::query()->where("id",$tournament['game_id'])->value("name")}}</td>
                    <td>{{ $tournament['date'] }}</td>
                    <td>{{ $tournament['time'] }}</td>
                    <td><a class="btn btn-primary" href={{url("tournaments",$tournament->id)}}>Więcej</a>
                        <form method="post" action="{{route("delete.tournament", $tournament->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
