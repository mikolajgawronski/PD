@extends("master")
@section("addGame")

    @include('message')
    @include('errors')

<div class="container">
    <form method="post" action="{{route("store.game")}}" enctype="multipart/form-data">
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
        <label for="photo">Zdjęcie:</label>
        <input type="file" class="form-control" id="photo" name="photo">
        <div class="col">
            <br>
            <label for="name">Kategorie:</label>
            <br>
            <input type="checkbox" id="is_strategic" name="is_strategic">
            <label for="is_strategic">Strategiczna</label>
            <br>
            <input type="checkbox" id="is_for_children" name="is_for_children">
            <label for="is_for_children">Dla dzieci</label>
            <br>
            <input type="checkbox" id="is_for_families" name="is_for_families">
            <label for="is_for_families">Rodzinna</label>
            <br>
            <input type="checkbox" id="is_economic" name="is_economic">
            <label for="is_economic">Ekonomiczna</label>
            <br>
            <input type="checkbox" id="is_card" name="is_card">
            <label for="is_card">Karciana</label>
            <br>
            <input type="checkbox" id="is_coop" name="is_coop">
            <label for="is_coop">Kooperacyjna</label>
            <br>
            <input type="checkbox" id="is_party" name="is_party">
            <label for="is_party">Imprezowa</label>
            <br>
            <input type="checkbox" id="is_euro" name="is_euro">
            <label for="is_euro">Euro</label>
            <br>
            <input type="checkbox" id="is_ameritrash" name="is_ameritrash">
            <label for="is_ameritrash">Ameritrash</label>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>
@stop
