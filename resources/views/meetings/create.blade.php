@extends("master")
@section("addMeeting")
<div class="container">
    <form method="post" action="{{route("store.meeting")}}">
        @csrf
        <div class="row align-items-center">
             <div class="col">
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="name">Data:</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <br>
                        <label for="name">Godzina:</label>
                        <input type="time" class="form-control" id="time" name="time">
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>
@stop
