@extends("master")
@section("games")

    @include('message')

    <h3>Nasze gry:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Karton</th>
                <th scope="col">Ilość Graczy</th>
                <th scope="col">Czas Gry</th>
                <th scope="col">Ocena wg BGG</th>
                <th scope="col">Złożoność wg BGG</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game['name'] }}</td>
                    <td>{{ $game['box'] }}</td>
                    <td>{{ $game['min_players'] }}-{{ $game['max_players'] }}</td>
                    <td>{{ $game['min_time'] }}-{{ $game['max_time'] }} minut</td>
                    <td>{{ $game['rating_bgg'] }}</td>
                    <td>{{ $game['complexity_bgg'] }}</td>
                    <td>
                        <button class="btn btn-primary" href={{url("games",$game->id)}}>Więcej</button>
                        <button class="btn btn-success">Wypożycz</button>
                        <form method="post" action="{{route("delete.game", $game->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
