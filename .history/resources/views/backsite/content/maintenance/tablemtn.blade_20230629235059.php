@extends('backsite.dashboard')

@section('content')

<div>
    <div class="mb-3">
        <h3>Maintenance Registry</h3>
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
                        <button type="button" class="btn btn-sm rounded-pill btn-outline-primary bi-wrench" data-bs-toggle="modal" data-bs-target="#AddMaintenance{{ $cars['car_id'] }}"></button>
                        {{-- <form action="{{ route('car.createMtn', $cars['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                            <input type="hidden" name="brand" value="{{ $cars['brand'] }}">
                            <input type="hidden" name="model" value="{{ $cars['model'] }}">
                            <input type="hidden" name="registration_number" value="{{ $cars['registration_number'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-primary bi-wrench" type="submit" name='submit'></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($Cars as $cars)
    <div class="modal fade" id="AddMaintenance{{ $cars['car_id'] }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Maintenance</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('car.storeMtn') }}" method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="car_id" id="car_id" value="{{ $cars['car_id'] }}">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="car_id" id="car_id" class="form-control" value="{{ $cars['car_id'] }}" placeholder="Car ID" disabled>
                                <label for="car_id">Car ID</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="brand" id="brand" class="form-control" value="{{ $cars['brand'] }}" placeholder="Brand" disabled>
                                <label for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="model" id="model" class="form-control" value="{{ $cars['model'] }}" placeholder="Model" disabled>
                                <label for="model">Model</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $cars['registration_number'] }}" placeholder="Registration Number" disabled>
                                <label for="registration_number">Registration Number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="last_odometer" id="last_odometer" class="form-control" placeholder="Last Odometer" required>
                                <label for="last_odometer">Last Odometer</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">
                                    Please provide the last odometer data.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="type" id="type" class="form-control" placeholder="Type" required>
                                <label for="type">Type</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">
                                    Please provide the type of maintenance.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="Date" name="date" id="date" class="form-control" placeholder="Date" required>
                                <label for="date">Date</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">
                                    Please provide the maintenance date.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="expense" id="expense" class="form-control" placeholder="Expense" required>
                                <label for="expense">Expense</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">
                                    Please provide the maintenance expense.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Description" style="height: 150px;" required></textarea>
                                <label for="description">Description</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">
                                    Please provide description.
                                </div>
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