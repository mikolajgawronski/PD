@extends("master")
@section("posts")

    @include('message')

    <h1>Najnowsze aktualności:</h1>
    <hr>
    @foreach($posts as $post)
        <br>
        <h6>Dodano: {{$post["date"]}}, {{$post["time"]}}</h6>
        <h2><a href={{url("posts",$post->id)}}>{{$post["title"]}}</a></h2>
        <br>
        <h4>{{$post["body"]}}</h4>
        <br>
        <hr>
    @endforeach




@stop
