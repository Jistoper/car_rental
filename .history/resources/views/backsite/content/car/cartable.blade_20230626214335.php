@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row">
        <div class="col">
            <h3>Cars</h3>
        </div>
        <div class="col-md-2">
            <a href="{{ route('car.create') }}" class="btn btn-outline-primary rounded-pill bi-plus-lg"> Add Car</a>
        </div>
    </div>
    <div class="mb-3">
        
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
                        <form action="{{ route('car.edit', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <input type="hidden" name="brand" value="{{ $cars['brand'] }}">
                            <input type="hidden" name="model" value="{{ $cars['model'] }}">
                            <input type="hidden" name="year" value="{{ $cars['year'] }}">
                            <input type="hidden" name="registration_number" value="{{ $cars['registration_number'] }}">
                            <input type="hidden" name="vin" value="{{ $cars['vin'] }}">
                            <input type="hidden" name="engine_number" value="{{ $cars['engine_number'] }}">
                            <input type="hidden" name="color" value="{{ $cars['color'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" type="submit" name='submit'></button>
                        </form>
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.delete', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger bi-x-circle" type="submit" name='submit'></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection