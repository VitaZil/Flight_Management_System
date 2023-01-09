<x-layout>
    <div class="filter-container">
        <div class="filter-box">

    <div class="filter">
        <form action="flights/filter" class="flight-form">
            @csrf
            <div class="input-container form-converter input-filter">
                <select class="input" name="newtimezone" id="newtimezone" required>
                    @foreach($timezones as $timezone)
                        <option value="{{ $timezone }}">{{ $timezone }}</option>
                    @endforeach
                </select>
            </div>
            <button class="button-flights">Change Time Zone</button>
        </form>
    </div>
    </div>
        <h1 class="title-table">Flights</h1>

    <table class="">
        <tr>
            <th>Details</th>
            <th>Departure Time</th>
            <th>Departure Airport</th>
            <th>Arrival Time</th>
            <th>Arrival Airport</th>
            <th>Time Zone</th>
            <th>Number Of Seats</th>
            <th>Action</th>
        </tr>
        @foreach($flights as $flight)
            <tr>
                <td><a href="flights/{{$flight->id}}" class="button-flights">View</a></td>
                <td>{{ $flight->departure_time }}</td>
                <td>{{ $flight->departureAirport->name }}</td>
                <td>{{ $flight->arrival_time }}</td>
                <td>{{ $flight->arrivalAirport->name }}</td>
                <td>{{ $flight->timezone }}</td>
                <td>{{ $flight->seats }}</td>
                <td>

                    <a class="button-flights" href="/flights/{{ $flight->id }}/edit">Edit</a>
                    <form method="POST" action="/flights/{{ $flight->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $flight->id }}">
                        <button class="button-flights" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</x-layout>
