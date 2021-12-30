@extends("master")
@section("game")
    <div class="table-responsive">

        <h1>{{$game->name}}</h1>
        <h5>{{$game->description}}</h5>
        <br>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Karton</th>
                <th scope="col">Ilość Graczy</th>
                <th scope="col">Czas Gry</th>
                <th scope="col">Ocena wg BGG</th>
                <th scope="col">Złożoność wg BGG</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $game->box }}</td>
                    <td>{{ $game->min_players }}-{{ $game->max_players }}</td>
                    <td>{{ $game->min_time }}-{{ $game->max_time }} minut</td>
                    <td>{{ $game->rating_bgg }}</td>
                    <td>{{ $game->complexity_bgg }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
