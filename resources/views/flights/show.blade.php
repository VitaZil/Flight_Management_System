<x-layout>

    <h1 class="title title-info">Flight Information</h1>

    <table class="show-info-table">
        <div class="table-head">
            <tr>
                <th>Departure Time</th>
                <th>Departure Airport</th>
                <th>Arrival Time</th>
                <th>Arrival Airport</th>
                <th>Time Zone</th>
                @if (!isset($arrivalTime))
                    <th>Change Time Zone</th>
                @endif
            </tr>
        </div>
        <div class="table-details">
            <tr>
                <td>{{ $flight->departure_time }}</td>
                <td>{{ $flight->departureAirport->name }}</td>
                <td>{{ $flight->arrival_time }}</td>
                <td>{{ $flight->arrivalAirport->name }}</td>
                <td>{{ $flight->timezone }}</td>
                @if (!isset($arrivalTime))
                    <td>
                        <form method="POST" action="/flights/{{ $flight->id }}/time">
                            @csrf
                            <div class="input-container form-converter">
                                <input type="hidden" name="departure_time" value="{{$flight->departure_time}}">
                                <input type="hidden" name="arrival_time" value="{{$flight->arrival_time}}">
                                <select class="input" name="newtimezone" id="newtimezone" required>
                                    @foreach($timezones as $timezone)
                                        <option value="{{ $timezone }}">{{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="show-button">Check</button>
                        </form>
                    </td>
                @endif
            </tr>
        </div>
    </table>

    <div class="time-calculator">
        @if (isset($arrivalTime))
            <h1 class="title title-info">New Time Zone Information</h1>
            <table class="show-info-table">
                <div class="table-head">
                    <tr>
                        <th>Departure Time</th>
                        <th>Departure Airport</th>
                        <th>Arrival Time</th>
                        <th>Arrival Airport</th>
                        <th>Time Zone</th>
                    </tr>
                </div>
                <div class="table-details">
                    <tr>
                        <td>{{ $departureTime }}</td>
                        <td>{{ $flight->departureAirport->name }}</td>
                        <td>{{ $arrivalTime }}</td>
                        <td>{{ $flight->arrivalAirport->name }}</td>
                        <td>{{ $chosenTimeZone }}</td>
                    </tr>
                </div>
            </table>
        @endif
    </div>
    </div>
    </div>
</x-layout>
