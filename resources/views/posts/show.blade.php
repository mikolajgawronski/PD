@extends("master")
@section("post")

        <h6>Dodano: {{$post[0]["date"]}}, {{$post[0]["time"]}}</h6>
        <h1>{{$post[0]["title"]}}</h1>
        <br>
        <h5>{{$post[0]["body"]}}</h5>

@stop
