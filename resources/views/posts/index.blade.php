@extends("master")
@section("posts")

    @include('message')

    @if (!Auth::user() == null)
        @if (Auth::user()->admin == true)
            <a class="btn btn-success" href={{url("add","post")}}>Dodaj post</a>
            <br>
            <br>
        @endif
    @endif

    <h1>Najnowsze aktualności:</h1>
    <hr>

    <h1>{{\Carbon\Carbon::parse(\Carbon\Carbon::now()->addHour())->format('d.m.Y, H:i:s')}}</h1>

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
