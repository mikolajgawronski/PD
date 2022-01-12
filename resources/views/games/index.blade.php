@extends("master")
@section("games")

    @include('message')

    <h3>Nasze gry:</h3>
    <br>

    <h4>Filtry:</h4>
    <form method="get" action="{{route("filter.game")}}">
    <div class="row align-items-center">
        <div class="col-md-3">
            <label for="name">Nazwa gry:</label>
            <input type="text" class="form-control" id="name" name="name">
            <br>
            <label for="name">Ilość graczy:</label>
            <input type="number" class="form-control" id="players" name="players">
        </div>
        <br>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
            <label for="name">Kategorie:</label>
            <br>
            <input type="checkbox" id="is_strategic" name="is_strategic">
            <label for="is_strategic">Strategiczna</label>
            <br>
            <input type="checkbox" id="is_for_children" name="is_for_children">
            <label for="is_for_children">Dla dzieci</label>
            <br>
            <input type="checkbox" id="is_for_families" name="is_for_families">
            <label for="is_for_families">Rodzinna</label>
            <br>
            <input type="checkbox" id="is_economic" name="is_economic">
            <label for="is_economic">Ekonomiczna</label>
            <br>
            <input type="checkbox" id="is_card" name="is_card">
            <label for="is_card">Karciana</label>
            <br>
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="is_coop" name="is_coop">
            <label for="is_coop">Kooperacyjna</label>
            <br>
            <input type="checkbox" id="is_party" name="is_party">
            <label for="is_party">Imprezowa</label>
            <br>
            <input type="checkbox" id="is_euro" name="is_euro">
            <label for="is_euro">Euro</label>
            <br>
            <input type="checkbox" id="is_ameritrash" name="is_ameritrash">
            <label for="is_ameritrash">Ameritrash</label>

        </div>
        <br>
    </div>
        <br>
        <button type="submit" class="btn btn-primary">Filtruj</button>

    </form>


    @auth
        @if (Auth::user()->admin == true)
        <br>
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
                            @auth
                                @if ($game->available == true)
                                    <form method="post" action="{{route("borrow.game", $game->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Wypożycz</button>
                                    </form>
                                @endif
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
