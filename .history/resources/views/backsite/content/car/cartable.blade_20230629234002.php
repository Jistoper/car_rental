@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row">
        <div class="col">
            <h3>Cars</h3>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-outline-primary rounded-pill bi-plus-lg" data-bs-toggle="modal" data-bs-target="#AddCar"> Add Car</button>
            {{-- <a href="{{ route('car.create') }}" class="btn btn-outline-primary rounded-pill bi-plus-lg"> Add Car</a> --}}
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
            <th scope="col">Type</th>
            <th scope="col">Capacity</th>
            <th scope="col">Year</th>
            <th scope="col">Registration Number</th>
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
                    <td>{{ $cars['type'] }}</td>
                    <td>{{ $cars['capacity'] }}</td>
                    <td>{{ $cars['year'] }}</td>
                    <td>{{ $cars['registration_number'] }}</td>
                    <td>{{ $cars['color'] }}</td>
                    <td>{{ $cars['is_available'] ? 'Yes' : 'No' }}</td>
                    <td>
                        <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" data-bs-toggle="modal" data-bs-target="#EditCar{{ $cars['car_id'] }}"></button>
                        {{-- <form action="{{ route('car.edit', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <input type="hidden" name="brand" value="{{ $cars['brand'] }}">
                            <input type="hidden" name="model" value="{{ $cars['model'] }}">
                            <input type="hidden" name="type" value="{{ $cars['type'] }}">
                            <input type="hidden" name="capacity" value="{{ $cars['capacity'] }}">
                            <input type="hidden" name="year" value="{{ $cars['year'] }}">
                            <input type="hidden" name="registration_number" value="{{ $cars['registration_number'] }}">
                            <input type="hidden" name="vin" value="{{ $cars['vin'] }}">
                            <input type="hidden" name="engine_number" value="{{ $cars['engine_number'] }}">
                            <input type="hidden" name="color" value="{{ $cars['color'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" type="submit" name='submit'></button>
                        </form> --}}
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

<div class="modal fade" id="AddCar" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Car</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('car.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand" required>
                            <label for="brand">Brand</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="model" id="model" class="form-control" placeholder="Model" required>
                            <label for="model">Model</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="type" id="type" class="form-control" placeholder="Type" required>
                            <label for="type">Type</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="color" id="color" class="form-control" placeholder="Color" required>
                            <label for="color">Color</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Capacity" required>
                            <label for="capacity">Capacity</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="year" id="year" class="form-control" placeholder="Year" required>
                            <label for="year">Year</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="Registration Number" required>
                            <label for="registration_number">Registration Number</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="vin" id="vin" class="form-control" placeholder="VIN" required>
                            <label for="vin">VIN</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="engine_number" id="engine_number" class="form-control" placeholder="Engine Number" required>
                            <label for="engine_number">Engine Number</label>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button class="btn btn-primary rounded-pill" onclick="getContent()" type="submit">
                            <span>
                                Submit
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@foreach($Cars as $cars)
    <div class="modal fade" id="EditCar{{ $cars['car_id'] }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Car Data</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('car.storeEdit') }}" method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="car_id" id="car_id" value="{{ $cars['car_id'] }}">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="brand" id="brand" class="form-control" value="{{ $cars['brand'] }}" placeholder="Brand" required>
                                <label for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="model" id="model" class="form-control" value="{{ $cars['model'] }}" placeholder="Model" required>
                                <label for="model">Model</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="type" id="type" class="form-control" value="{{ $cars['type'] }}" placeholder="Type" required>
                                <label for="type">Type</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="color" id="color" class="form-control" value="{{ $cars['color'] }}" placeholder="Color" required>
                                <label for="color">Color</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="capacity" id="capacity" class="form-control" value="{{ $cars['capacity'] }}" placeholder="Capacity" required>
                                <label for="capacity">Capacity</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="year" id="year" class="form-control" value="{{ $cars['year'] }}" placeholder="Year" required>
                                <label for="year">Year</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                    <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $cars['registration_number'] }}" placeholder="Registration Number" required>
                                    <label for="registration_number">Registration Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="vin" id="vin" class="form-control" value="{{ $cars['vin'] }}" placeholder="VIN" required>
                                    <label for="vin">VIN</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="engine_number" id="engine_number" class="form-control" value="{{ $cars['engine_number'] }}" placeholder="Engine Number" required>
                                <label for="engine_number">Engine Number</label>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <button class="btn btn-primary rounded-pill" onclick="getContent()" type="submit">
                                <span>
                                    Submit
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection