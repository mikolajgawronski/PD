@extends("master")
@section("meetings")

    @include('message')

    <h3>Najbliższe spotkania:</h3>
    <br>
    @if (!Auth::user() == null)
        @if (Auth::user()->admin == true)
            <a class="btn btn-success" href={{url("add","meeting")}}>Dodaj spotkanie</a>
            <br>
            <br>
        @endif
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-light">
            <thead>
           <tr>
              <th scope="col">Data</th>
              <th scope="col">Godzina Rozpoczęcia</th>
              <th scope="col">Godzina Zakończenia</th>
              <th scope="col">Akcje</th>
          </tr>
         </thead>
         <tbody>
         @foreach($meetings as $meeting)
            <tr>
                <td>{{ $meeting['date'] }}</td>
                <td>{{ $meeting['start_time'] }}</td>
                <td>{{ $meeting['end_time'] }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a class="btn btn-primary" href={{url("meetings",$meeting->id)}}>Pokoje Gier</a>
                        <form method="post" action="{{route("delete.meeting", $meeting->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @stop
