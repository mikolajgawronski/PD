@extends("master")
@section("addRoom")
    <div class="container">

        @include('message')

        <form method="post" action="{{route("store.room")}}">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div>
                        <div class="form-group" >
                            <label for="name">Godzina:</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="name">Gra:</label>
                        <select class="form-select" size="18" aria-label="Default select example" name="game_id">
                            @foreach($games as $game)
                                <option value="{{$game["id"]}}" id="game_id">{{$game["name"]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="name">Spotkanie:</label>
                        <select class="form-select" size="18" aria-label="Default select example" name="meeting_id">
                            @foreach($meetings as $meeting)
                                <option value="{{$meeting["id"]}}" id="meeting_id">{{$meeting["date"]}}</option>
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
