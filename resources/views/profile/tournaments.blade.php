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
                    <td>{{$attendant->getTournamentName() }}</td>
                    <td>{{$attendant->getGameName() }}</td>
                    <td>{{$carbon->parse($attendant->getTournamentTime())->format("H:i") }}</td>
                    <td>{{$carbon->parse($attendant->getTournamentDate())->format("d.m.Y") }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href={{url("tournaments", $attendant->tournament_id)}}>Więcej</a>

                            <form method="post" action="{{route("cancel.attendance", $attendant->id)}}">
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
