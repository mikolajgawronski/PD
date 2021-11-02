@extends("master")
@section("rooms")
    <div class="table-responsive">

        @include('message')

        <h1>Pokoje gier:</h1>
        <h5>{{\App\Models\Meeting::query()->where("id",$meeting_id)->value("date")}}</h5>
        <br>
        <a class="btn btn-success" href={{url("add","room")}}>Stwórz pokój</a>
        <br>
        <br>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Gra</th>
                <th scope="col">Godzina</th>
                <th scope="col">Zapisani gracze</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ \App\Models\Game::query()->where("id",$room['game_id'])->value("name")}}</td>
                    <td>{{ $room['time'] }}</td>
                    <td>{{ $room['current_players'] }} / {{ $room['max_players'] }}</td>
                    <td>@if (!Auth::user() == null)
                            @if ($room['current_players'] < $room['max_players'] && !$room->checkIfJoined($room['id']))
                                <form method="post" action="{{route("join.room", $room->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Dołącz</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
