@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle">
        <h3>Rental</h3>
    </div>
    <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Registration Number</th>
            <th scope="col">VIN</th>
            <th scope="col">Engine Number</th>
            <th scope="col">Color</th>
            <th scope="col">Available</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($Cars as $cars)
                <tr>
                    <td>{{ $cars['car_id'] }}</td>
                    <td>{{ $cars['brand'] }}</td>
                    <td>{{ $cars['model'] }}</td>
                    <td>{{ $cars['year'] }}</td>
                    <td>{{ $cars['registration_number'] }}</td>
                    <td>{{ $cars['vin'] }}</td>
                    <td>{{ $cars['engine_number'] }}</td>
                    <td>{{ $cars['color'] }}</td>
                    <td>{{ $cars['is_available'] ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('car.rentView') }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <input type="hidden" name="brand" value="{{ $cars['brand'] }}">
                            <input type="hidden" name="model" value="{{ $cars['model'] }}">
                            <input type="hidden" name="registration_number" value="{{ $cars['registration_number'] }}">
                            <input type="hidden" name="color" value="{{ $cars['color'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-primary bi-bag-fill" type="submit" name='submit'> Rent</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection