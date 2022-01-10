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
                    <td>{{$room->getGameName()}}</td>
                    <td>{{$carbon->parse($room->getRoomTime())->format("H:i")}}</td>
                    <td>{{$carbon->parse($room->getMeetingDate())->format("d.m.Y")}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary" href={{url("rooms", $room->room_id)}}>Więcej</a>

                            <form method="post" action="{{route("cancel.playing", $room->id)}}">
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
