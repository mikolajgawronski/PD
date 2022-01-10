@extends("master")
@section("tournaments")

    @include('message')

    <h3>Najbliższe turnieje:</h3>
    <br>
    @auth
        @if (Auth::user()->admin == true)
            <a class="btn btn-success" href={{url("add","tournament")}}>Dodaj turniej</a>
            <br>
            <br>
        @endif
    @endauth
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
                    <td>{{ $tournament->name }}</td>
                    <td>{{ $tournament->getGameName() }}</td>
                    <td>{{ $carbon->parse($tournament->date)->format("d.m.Y") }}</td>
                    <td>{{ $carbon->parse($tournament->time)->format("H:i") }}</td>
                    <td>{{ $tournament->current_players }}</td>
                    <td>{{ $tournament->max_players }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href="/games/{{$tournament->id}}">Więcej</a>
                            @auth
                                @if ($tournament->current_players < $tournament->max_players && !$tournament->checkIfJoined($tournament->id))
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
                            @endauth
                        </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
