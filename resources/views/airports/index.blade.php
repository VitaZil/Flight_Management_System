<x-layout>
    <div class="container-airports">
    @include('components.search')


    <h1 class="title-table">Airports</h1>
    <table class="airport-table">
    <tr>
        <th>Ident</th>
        <th>Type</th>
        <th>Name</th>
        <th>Elevation Ft</th>
        <th>Content</th>
        <th>Iso Country</th>
        <th>Iso Region</th>
        <th>Municipality</th>
        <th>Gps Code</th>
        <th>Iata Code</th>
        <th>Local Code</th>
        <th>Coordinates</th>
    </tr>

    @foreach($airports as $airport)
        <tr>
            <td>{{ $airport->ident }}</td>
            <td>{{ $airport->type }}</td>
            <td>{{ $airport->name }}</td>
            <td>{{ $airport->elevation_ft }}</td>
            <td>{{ $airport->continent }}</td>
            <td>{{ $airport->iso_country }}</td>
            <td>{{ $airport->iso_region }}</td>
            <td>{{ $airport->municipality }}</td>
            <td>{{ $airport->gps_code }}</td>
            <td>{{ $airport->iata_code }}</td>
            <td>{{ $airport->local_code }}</td>
            <td>{{ $airport->coordinates }}</td>
        </tr>
    @endforeach
</table>

    <div class="pagination">
        {{$airports->links()}}
    </div>
</div>
    </x-layout>
