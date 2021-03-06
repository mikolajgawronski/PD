@extends("master")
@section("addGame")

    @include('message')
    @include('errors')

<div class="container">
    <form method="post" action="{{route("store.post")}}">
        @csrf
        <div class="row align-items-center">
             <div class="col">
                <div>
                    <div class="form-group">
                        <label for="name">Tytuł posta:</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <br>
                        <label for="name">Treść posta:</label>
                        <textarea class="form-control" id="body" name="body" style="height: 200px"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>
@stop
