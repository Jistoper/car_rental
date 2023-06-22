@extends('backsite.dashboard')

@section('content')

<div>
    <div class="mb-3">
        <a href="{{ route('car.create') }}" class="btn btn-outline-primary rounded-pill bi-plus-lg"> Add Car</a>
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
                            <button class="btn btn-sm rounded-pill btn-outline-secondary" type="submit" name='submit'>Edit</button>
                        </form>
                        {{-- <a href="{{ route('car.edit', $cars['car_id']) }}" class="btn btn-sm rounded-pill btn-outline-secondary">Edit</a> --}}
                        <form action="{{ route('car.delete') }}" class="d-inline" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <button name="submit" type="button" class="btn btn-sm rounded-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#basicModal">
                                Delete
                            </button>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this data?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-outline-danger" id="confirmDelete">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (confirm('Are you sure you want to delete this data?')) {
            document.getElementById('deleteForm').submit();
        }
    });
</script>

@endsection