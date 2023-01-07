<x-layout>

    <form action="/flights/{{ $flight->id }}/update" method="POST">
        @csrf
        @method('PUT')
        <label for="departure_time">Departure time</label>
        <input type="datetime-local" name="departure_time" value="{{ $flight->departure_time }}">

        <label for="depairport">Airport</label>
        <select name="depairport" id="depairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>

        <label for="arrival_time">Arrival time</label>
        <input type="datetime-local" name="arrival_time" value="{{ $flight->arrival_time }}">

        <label for="arrairport">Airport</label>
        <select name="arrairport" id="arrairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>

        <label for="seats">Number Of Seats</label>
        <input type="number" name="seats" value="{{ $flight->seats }}">

        <button type="submit">Update</button>
    </form>

    </x-layout>
