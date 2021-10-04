@extends("master")
@section("meetings")

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <h3>Najbliższe spotkania:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
           <tr>
              <th scope="col">Data</th>
              <th scope="col">Czas</th>
              <th scope="col">Akcje</th>
          </tr>
         </thead>
         <tbody>
         @foreach($meetings as $meeting)
            <tr>
                <td>{{ $meeting['date'] }}</td>
                <td>{{ $meeting['time'] }}</td>
                <td><a class="btn btn-primary" href={{url("meetings",$meeting->id)}}>Pokoje Gier</a>
                    <form method="post" action="{{route("delete.meeting", $meeting->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @stop
