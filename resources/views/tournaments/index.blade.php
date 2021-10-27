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
                <th scope="col">Zapisanych graczy</th>
                <th scope="col">Maksymalnie graczy</th>
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
                    <td>{{ $tournament['current_players'] }}</td>
                    <td>{{ $tournament['max_players'] }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href="/games/{{$tournament->id}}">Więcej</a>
                            @if (!Auth::user() == null)
                                @if ($tournament['current_players'] < $tournament['max_players'] && !$tournament->checkIfJoined($tournament['id']))
                                    <form method="post" action="{{route("join.tournament", $tournament->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Dołącz</button>
                                    </form>
                                @endif
                                @if (Auth::user()->admin == true)
                                    <form method="post" action="{{route("delete.tournament", $tournament->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
