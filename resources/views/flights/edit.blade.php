<x-layout>
    <div class="form">
        <h1 class="title">Edit Flight</h1>
        <form action="/flights/{{ $flight->id }}/update" method="POST">
            @csrf
            @method('PUT')

            <div class="input-container">
                <label for="departure_time">Departure time</label>
                <input class="input" type="datetime-local" name="departure_time" required value="{{ $flight->departure_time }}">
            </div>

            <div class="input-container">
                <label for="depairport">Airport</label>
                <select class="input" name="depairport" id="depairport" required>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-container">
                <label for="arrival_time">Arrival time</label>
                <input class="input" type="datetime-local" name="arrival_time" required value="{{ $flight->arrival_time }}">
            </div>

            <div class="input-container">
                <label for="arrairport">Airport</label>
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
                <input class="input" type="number" name="seats" value="{{ $flight->seats }}">
            </div>


            <button class="button-btn clearfix" type="submit">Update</button>


        </form>
    </div>
</x-layout>
