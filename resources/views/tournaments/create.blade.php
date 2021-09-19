@extends("master")
@section("addTournament")
<div class="container">
    <form method="post" action="{{route("store.tournament")}}">
        @csrf
        <div class="row align-items-center">
             <div class="col-md-3">
                <div>
                    <div class="form-group" >
                        <label for="name">Nazwa:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <br>
                        <label for="name">Opis:</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <br>
                        <label for="name">Maksymalna ilość graczy:</label>
                        <input type="number" class="form-control" id="max_players" name="max_players" placeholder=0>
                        <br>
                        <label for="name">Data:</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <br>
                        <label for="name">Godzina:</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group" >
                    <label for="name">Gra:</label>
                    <select class="form-select" size="18" aria-label="Default select example">
                        @foreach($games as $game)
                            <option value="{{$game["id"]}}" id="game_id">{{$game["name"]}}</option>
                            {{$game["name"]}}
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>
@stop
