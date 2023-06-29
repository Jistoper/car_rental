@extends('backsite.dashboard')

@section('content')

<div>
    <div class="mb-3">
        <h3>Maintenance History</h3>
    </div>
    <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Car ID</th>
            <th scope="col">Last Odometer</th>
            <th scope="col">Type</th>
            <th scope="col">Date</th>
            <th scope="col">Expense</th>
            <th scope="col">Action</th>
            <th scope="col">Action2</th>
          </tr>
        </thead>
        <tbody>
            @foreach($Mtn as $index => $mtn)
                <tr>
                    <td>{{ $mtn['maintenance_id'] }}</td>
                    <td>{{ $mtn['car_id'] }}</td>
                    <td>{{ $mtn['last_odometer'] }}</td>
                    <td>{{ $mtn['type'] }}</td>
                    <td>{{ $mtn['maintenance_date'] }}</td>
                    <td>{{ $mtn['expense'] }}</td>
                    <td>
                        <button name="submit" type="button" class="btn btn-sm btn-outline-info rounded-pill bi-eye" data-bs-toggle="modal" data-bs-target="#basicModal{{ $mtn['maintenance_id'] }}">
                        </button>
                        <div class="modal fade" id="basicModal{{ $mtn['maintenance_id'] }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Maintenance Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <b>
                                                Car ID :
                                            </b>
                                            {{ $mtn['car_id'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Brand :
                                            </b>
                                            {{ $Car[$mtn['car_id']]['brand'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Model :
                                            </b>
                                            {{ $Car[$mtn['car_id']]['model'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Registration Number :
                                            </b>
                                            {{ $Car[$mtn['car_id']]['registration_number'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Date :
                                            </b>
                                            {{ $mtn['maintenance_date'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Last Odometer :
                                            </b>
                                            {{ $mtn['last_odometer'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Expense :
                                            </b>
                                            Rp {{ $mtn['expense'] }},-
                                        </p>
                                        <p>
                                            <b>
                                                Type :
                                            </b>
                                            {{ $mtn['type'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Description :
                                            </b>
                                            <br>
                                            {{ $mtn['description'] }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" data-bs-toggle="modal" data-bs-target="#EditMaintenance{{ $mtn['maintenance_id'] }}"></button>
                        <div class="modal fade" id="EditMaintenance{{ $mtn['maintenance_id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Maintenance Data</h5>
                                        <a href="{{ route('car.getListMtn') }}" class="btn-close"></a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('car.storeMtn') }}" method="POST" class="row g-3 needs-validation" novalidate>
                                            @csrf
                                            <input type="hidden" name="maintenance_id" id="maintenance_id" value="{{ $mtn['maintenance_id'] }}">
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="car_id" id="car_id" class="form-control" value="{{ $mtn['car_id'] }}" placeholder="Car ID" disabled>
                                                    <label for="car_id">Car ID</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="brand" id="brand" class="form-control" value="{{ $Car[$mtn['car_id']]['brand'] }}" placeholder="Brand" disabled>
                                                    <label for="brand">Brand</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="model" id="model" class="form-control" value="{{ $Car[$mtn['car_id']]['model'] }}" placeholder="Model" disabled>
                                                    <label for="model">Model</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $Car[$mtn['car_id']]['registration_number'] }}" placeholder="Registration Number" disabled>
                                                    <label for="registration_number">Registration Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" name="last_odometer" id="last_odometer" class="form-control" value="{{ $mtn['last_odometer'] }}" placeholder="Last Odometer" required>
                                                    <label for="last_odometer">Last Odometer</label>
                                                    <div class="valid-feedback"></div>
                                                    <div class="invalid-feedback">
                                                        Please provide the last odometer data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="type" id="type" class="form-control" value="{{ $mtn['type'] }}" placeholder="Type" required>
                                                    <label for="type">Type</label>
                                                    <div class="valid-feedback"></div>
                                                    <div class="invalid-feedback">
                                                        Please provide the type of maintenance.
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="Date" name="date" id="date" class="form-control" value="{{ $mtn['date'] }}" placeholder="Date" required>
                                                    <label for="date">Date</label>
                                                    <div class="valid-feedback"></div>
                                                    <div class="invalid-feedback">
                                                        Please provide the maintenance date.
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="expense" id="expense" class="form-control" value="{{ $mtn['expense'] }}" placeholder="Expense" required>
                                                    <label for="expense">Expense</label>
                                                    <div class="valid-feedback"></div>
                                                    <div class="invalid-feedback">
                                                        Please provide the maintenance expense.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea type="text" name="description" id="description" class="form-control" placeholder="Description" style="height: 150px;" required>{{ $mtn['description'] }}</textarea>
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
                                        <a href="{{ route('car.getListMtn') }}" class="btn btn-outline-secondary rounded-pill">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <form action="{{ route('car.mtnEdit', $mtn['maintenance_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="maintenance_id" value="{{ $mtn['maintenance_id'] }}">
                            <input type="hidden" name="car_id" value="{{ $mtn['car_id'] }}">
                            <input type="hidden" name="last_odometer" value="{{ $mtn['last_odometer'] }}">
                            <input type="hidden" name="type" value="{{ $mtn['type'] }}">
                            <input type="hidden" name="description" value="{{ $mtn['description'] }}">
                            <input type="hidden" name="expense" value="{{ $mtn['expense'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" type="submit" name='submit'></button>
                        </form> --}}
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.mtnDelete', $mtn['maintenance_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="maintenance_id" value="{{ $mtn['maintenance_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger bi-x-circle" type="submit" name='submit'></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
