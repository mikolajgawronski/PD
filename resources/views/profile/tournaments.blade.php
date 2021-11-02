<h3>Turnieje na które jesteś zapisany:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Turniej</th>
                <th scope="col">Gra</th>
                <th scope="col">Godzina</th>
                <th scope="col">Data</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendants as $attendant)
                <tr>
                    <td>{{\App\Models\Tournament::query()->where("id",$attendant['tournament_id'])->value("name") }}</td>
                    <td>{{\App\Models\Game::query()->where("id",\App\Models\Tournament::query()->where("id",$attendant['tournament_id'])->value("game_id"))->value("name") }}</td>
                    <td>{{\App\Models\Tournament::query()->where("id",$attendant['tournament_id'])->value("time") }}</td>
                    <td>{{\App\Models\Tournament::query()->where("id",$attendant['tournament_id'])->value("date") }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href={{url("tournaments", $attendant['tournament_id'])}}>Więcej</a>

                            <form method="post" action="{{route("cancel.attendance", $attendant['id'])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Anuluj uczestnictwo</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
