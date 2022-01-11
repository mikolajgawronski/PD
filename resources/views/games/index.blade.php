@extends("master")
@section("games")

    @include('message')

    <h3>Nasze gry:</h3>
    <br>


    <form method="get" action="{{route("filter.game")}}">
        <input type="checkbox" id="is_economic" name="is_economic">
        <label for="is_economic">Ekonomiczna</label>
        <button type="submit" class="btn btn-primary">Filtruj</button>
    </form>


    @auth
        @if (Auth::user()->admin == true)
        <a class="btn btn-success" href={{url("add","game")}}>Dodaj grę</a>
        <br>
        <br>
        @endif
    @endauth
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Karton</th>
                <th scope="col">Ilość Graczy</th>
                <th scope="col">Czas Gry</th>
                <th scope="col">Kategorie</th>
                <th scope="col">Ocena wg BGG</th>
                <th scope="col">Złożoność wg BGG</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->box }}</td>
                    <td>{{ $game->min_players }}-{{ $game->max_players }}</td>
                    <td>{{ $game->min_time }}-{{ $game->max_time }} minut</td>
                    <td>{{ $game->getCategories()}}</td>
                    <td>{{ $game->rating_bgg }}</td>
                    <td>{{ $game->complexity_bgg }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href="/games/{{$game->id}}">Więcej</a>
                            @if ($game->available == true)
                                <form method="post" action="{{route("borrow.game", $game->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Wypożycz</button>
                                </form>
                            @endif
                            @auth
                                @if (Auth::user()->admin == true)
                                    <form method="post" action="{{route("delete.game", $game->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
