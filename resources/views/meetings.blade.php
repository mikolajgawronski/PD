@extends("master")
@section("meetings")
<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meetings as $meeting)
            <tr>
                <td>{{ $meeting['date'] }}</td>
                <td>{{ $meeting['time'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
