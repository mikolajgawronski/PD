@extends("master")
@section("game")
    <div class="table-responsive">

        <h1>{{$game[0]["name"]}}</h1>
        <h5>{{$game[0]["description"]}}</h5>
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
                    <td>{{ $game[0]['box'] }}</td>
                    <td>{{ $game[0]['min_players'] }}-{{ $game[0]['max_players'] }}</td>
                    <td>{{ $game[0]['min_time'] }}-{{ $game[0]['max_time'] }} minut</td>
                    <td>{{ $game[0]['rating_bgg'] }}</td>
                    <td>{{ $game[0]['complexity_bgg'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
