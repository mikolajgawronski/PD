@extends("master")
@section("post")

        <h6>Dodano: {{$post->date}}, {{$post->time}}</h6>
        <h1>{{$post->title}}</h1>
        <br>
        <h5>{{$post->body}}</h5>

@stop
