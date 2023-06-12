{{-- @extends('backsite.dashboard')

@section('content') --}}

<div>
    <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Resgistration Number</th>
            <th scope="col">VIN</th>
            <th scope="col">Engine Number</th>
            <th scope="col">Color</th>
            <th scope="col">Available</th>
          </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    {{-- <th scope="row"></th> --}}
                    <td>{{ $car['car_id'] }}</td>
                    <td>{{ $car['brand'] }}</td>
                    <td>{{ $car['model'] }}</td>
                    <td>{{ $car['year'] }}</td>
                    <td>{{ $car['registration_number'] }}</td>
                    <td>{{ $car['vin'] }}</td>
                    <td>{{ $car['engine_number'] }}</td>
                    <td>{{ $car['color'] }}</td>
                    <td>{{ $car['is_available'] ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>

{{-- @endsection --}}