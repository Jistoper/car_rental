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
            <th scope="col">Car ID</th>
            <th scope="col">Last Odometer</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Expense</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($Cars as $cars)
                <tr>
                    <td>{{ $cars['maintenance_id'] }}</td>
                    <td>{{ $cars['car_id'] }}</td>
                    <td>{{ $cars['last_odometer'] }}</td>
                    <td>{{ $cars['type'] }}</td>
                    <td>{{ $cars['description'] }}</td>
                    <td>{{ $cars['expense'] }}</td>
                    <td>
                        <form action="{{ route('car.edit', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="maintenance_id" value="{{ $cars['maintenance_id'] }}">
                            <input type="hidden" name="last_odometer" value="{{ $cars['last_odometer'] }}">
                            <input type="hidden" name="type" value="{{ $cars['type'] }}">
                            <input type="hidden" name="description" value="{{ $cars['description'] }}">
                            <input type="hidden" name="expense" value="{{ $cars['expense'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary" type="submit" name='submit'>Edit</button>
                        </form>
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.delete', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger" type="submit" name='submit'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection