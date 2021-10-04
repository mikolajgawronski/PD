@extends("master")
@section("addGame")

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

<div class="container">
    <form method="post" action="{{route("store.game")}}">
        @csrf
        <div class="row align-items-center">
             <div class="col">
                <div>
                    <div class="form-group" >
                        <label for="name">Nazwa gry:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <br>
                        <label for="name">Ocena wg BGG:</label>
                        <input type="text" class="form-control" id="rating_bgg" name="rating_bgg">
                        <br>
                        <label for="name">Złożoność wg BGG:</label>
                        <input type="text" class="form-control" id="complexity_bgg" name="complexity_bgg">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form-group" >
                    <label for="name">Opis:</label>
                    <input type="text" class="form-control" id="description" name="description">
                    <br>
                    <label for="name">Minimalna ilość graczy:</label>
                    <input type="number" class="form-control" id="min_players" name="min_players" placeholder=0>
                    <br>
                    <label for="name">Maksymalna ilość graczy:</label>
                    <input type="number" class="form-control" id="max_players" name="max_players" placeholder=0>
                </div>
            </div>

            <div class="col">
                <label for="name">Karton:</label>
                <input type="text" class="form-control" id="box" name="box">

                <br>
                <label for="name">Minimalna ilość czasu:</label>
                <input type="number" class="form-control" id="min_time" name="min_time" placeholder=30>
                <br>
                <label for="name">Maksymalna ilość czasu:</label>
                <input type="number" class="form-control" id="max_time" name="max_time" placeholder=60>
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>
@stop
