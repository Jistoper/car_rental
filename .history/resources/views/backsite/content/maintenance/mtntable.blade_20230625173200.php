@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row">
        <div class="col">
            <h3>Maintenance</h3>
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
            @foreach($Mtn as $mtn)
                <tr>
                    <td>{{ $mtn['maintenance_id'] }}</td>
                    <td>{{ $mtn['car_id'] }}</td>
                    <td>{{ $mtn['last_odometer'] }}</td>
                    <td>{{ $mtn['type'] }}</td>
                    <td>{{ $mtn['description'] }}</td>
                    <td>{{ $mtn['expense'] }}</td>
                    <td>
                        <button name="submit" type="button" class="btn btn-sm btn-outline-info rounded-pill bi-eye-fill" data-bs-toggle="modal" data-bs-target="#basicModal">
                        </button>
                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Maintenance Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Car ID : {{ $mtn['car_id'] }}
                                        </p>
                                        <p>
                                            Type : {{ $mtn['type'] }}
                                        </p>
                                        <p>
                                            Description : {{ $mtn['description'] }}
                                        </p>
                                        <p>
                                            <h5>
                                                Expense :
                                            </h5>
                                            {{ $mtn['description'] }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('car.edit', $mtn['maintenance_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="maintenance_id" value="{{ $mtn['maintenance_id'] }}">
                            <input type="hidden" name="last_odometer" value="{{ $mtn['last_odometer'] }}">
                            <input type="hidden" name="type" value="{{ $mtn['type'] }}">
                            <input type="hidden" name="description" value="{{ $mtn['description'] }}">
                            <input type="hidden" name="expense" value="{{ $mtn['expense'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary" type="submit" name='submit'>Edit</button>
                        </form>
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.delete', $mtn['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="car_id" value="{{ $mtn['maintenance_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger" type="submit" name='submit'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection