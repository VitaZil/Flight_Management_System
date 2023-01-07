<x-layout>

    <table>
        <tr>
            <th>Departure Time</th>
            <th>Departure Airport</th>
            <th>Arrival Time</th>
            <th>Arrival Airport</th>
            {{--        <th>Time Zone</th>--}}
            <th>Number Of Seats</th>
            <th>Action</th>
        </tr>
        @foreach($flights as $flight)
            <tr>
                <td>{{ $flight->departure_time }}</td>
                <td>
                    {{ $flight->depairport->name .
                ($airports->depairport->iata_code != '' ?
                ' (' . $airports->depairport->iata_code . ')' :
                ' (' . $airports->depairport->gps_code . ')') }}
                </td>
                <td>{{ $flight->arrival_time }}</td>
                <td>
                    {{ $flight->arrairport->name .
                ($airports->depairport->iata_code != '' ?
                ' (' . $airports->depairport->iata_code . ')' :
                ' (' . $airports->depairport->gps_code . ')') }}
                </td>
                {{--            <td>{{ $flight->time_zone }}</td>--}}
                <td>{{ $flight->seats }}</td>
                <td>
                    <a href="/flights/{{ $flight->id }}/edit">Edit</a>
                    <form method="POST" action="/flights/{{ $flight->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $flight->id }}">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</x-layout>
