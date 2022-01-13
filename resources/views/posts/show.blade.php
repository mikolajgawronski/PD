@extends("master")
@section("post")

        <h6>Dodano: {{$carbon->parse($post->datetime)->format("H:i, d.m.Y")}}</h6>
        <h1>{{$post->title}}</h1>
        <br>
        <h5>{{$post->body}}</h5>

@stop
