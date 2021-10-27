@include('message')

    <h3>Wypożyczone przez ciebie gry:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Status</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td>{{ \App\Models\Game::query()->where("id",$rental['game_id'])->value("name") }}</td>
                    @if ($rental["approved"] == true)
                        <td>Wypożyczona</td>
                    @else
                        <td>Do odbioru w klubie</td>
                    @endif
                    <td>
                        <div class="d-flex gap-2">
{{--                            <a class="btn btn-primary" href="/games/{{$game->id}}">Więcej</a>--}}

{{--                            <a class="btn btn-success">Wypożycz</a>--}}
{{--                            <form method="post" action="{{route("delete.game", $game->id)}}">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-danger">Usuń</button>--}}
{{--                            </form>--}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
