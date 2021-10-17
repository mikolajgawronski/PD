@extends("master")
@section("addMeeting")
<div class="container">

    @include('message')
    @include('errors')

    <form method="post" action="{{route("store.meeting")}}">
        @csrf
        <div class="row align-items-center">
             <div class="col">
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="name">Data:</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <br>
                        <label for="name">Godzina Rozpoczęcia:</label>
                        <input type="time" class="form-control" id="start_time" name="start_time">
                        <br>
                        <label for="name">Godzina Zakończenia:</label>
                        <input type="time" class="form-control" id="end_time" name="end_time">
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
