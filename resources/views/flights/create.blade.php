<x-layout>

    <form action="/flights/create" method="POST">
        @csrf
        <label for="departure_time">Departure Time</label>
        <input type="datetime-local" name="departure_time" required>

        <label for="depairport">Departure Airport</label>
        <select name="depairport" id="depairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>

        <label for="arrival_time">Arrival Time</label>
        <input type="datetime-local" name="arrival_time" required>

        <label for="arrairport">Arrival Airport</label>
        <select name="arrairport" id="arrairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>

        <label for="seats">Number Of Seats</label>
        <input type="number" name="seats" value="" min="1" required >

        <button type="submit">Create</button>
    </form>

</x-layout>
