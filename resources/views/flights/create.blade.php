<x-layout>
    <div class="form">
<h1 class="title">New Flight</h1>
    <form action="/flights/create" method="POST">
        @csrf

        <div class="input-container">
        <label for="departure_time">Departure Time</label>
        <input class="input" type="datetime-local" name="departure_time" required>
    </div>

        <div class="input-container">
        <label for="depairport">Departure Airport</label>
        <select class="input" name="depairport" id="depairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>
        </div>

            <div class="input-container">
        <label for="arrival_time">Arrival Time</label>
        <input class="input" type="datetime-local" name="arrival_time" required>
            </div>

                <div class="input-container">
        <label for="arrairport">Arrival Airport</label>
        <select class="input" name="arrairport" id="arrairport" required>
            @foreach($airports as $airport)
                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
            @endforeach
        </select>
                </div>

        <div class="input-container">
            <label for="timezone">Time Zone</label>
            <select class="input" name="timezone" id="timezone" required>
                @foreach($timezones as $timezone)
                    <option value="{{ $timezone }}">{{ $timezone }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-container">
        <label for="seats">Number Of Seats</label>
        <input class="input" type="number" name="seats" value="0" min="1" required >
        </div>
        <div class="btn-container">
        <button class="button-btn" type="submit">Create</button>
        </div>

    </form>
    </div>

</x-layout>
