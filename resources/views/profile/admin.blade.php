 <h3>Wypożycznenia gier:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Status</th>
                <th scope="col">Użytkownik</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adminRentals as $rental)
                <tr>
                    <td>{{ $rental->getGameName() }}</td>
                    @if ($rental->approved == true)
                        <td>Wypożyczona</td>
                    @else
                        <td>Do odbioru w klubie</td>
                    @endif
                    <td>{{$rental->getUserName()}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href={{url("games", $rental->game_id)}}>Więcej</a>
                            @if ($rental->approved == false)
                            <form method="post" action="{{route("rent.rental", $rental->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-success">Zatwierdź wypożyczenie</button>
                            </form>
                            @endif
                            <form method="post" action="{{route("delete.rental", $rental->id)}}">
                                @csrf
                                @if ($rental->approved == true)
                                    <button type="submit" class="btn btn-success">Przyjmij zwrot</button>
                                @else
                                    <button type="submit" class="btn btn-danger">Anuluj wypożyczenie</button>
                                @endif
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
