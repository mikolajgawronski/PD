    <h3>Pokoje do których dołaczyłeś:</h3>
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
            @foreach($rooms as $room)
                <tr>
                    <td>{{\App\Models\Game::query()->where("id",\App\Models\Room::query()->where("id",$room['room_id'])->value("game_id"))->value("name") }}</td>
                    <td>{{\App\Models\Room::query()->where("id",$room['room_id'])->value("time") }}</td>
                    <td>{{\App\Models\Meeting::query()->where("id",\App\Models\Room::query()->where("id",$room['room_id'])->value("meeting_id"))->value("date") }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href={{url("rooms", $room['id'])}}>Więcej</a>

                            <form method="post" action="{{route("cancel.playing", $room['id'])}}">
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
