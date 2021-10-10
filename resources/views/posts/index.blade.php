@extends("master")
@section("posts")

    @include('message')

    <h1>Najnowsze aktualności:</h1>
    <hr>
    @foreach($posts as $post)
        <br>
        <h6>Dodano: {{$post["date"]}}, {{$post["time"]}}</h6>
        <h3><a href={{url("posts",$post->id)}}>{{$post["title"]}}</a></h3>
        <h5>{{$post["body"]}}</h5>
        <br>
        <hr>
    @endforeach

@stop
