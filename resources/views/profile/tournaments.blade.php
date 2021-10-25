@include('message')

    <h3>Turnieje na które jesteś zapisany:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Godzina</th>
                <th scope="col">Data</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tournaments as $tournament)
                <tr>
                    <td>{{ $tournament['id'] }}</td>
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
