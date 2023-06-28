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
            <th scope="col">NIK</th>
            <th scope="col">Usage Region</th>
            <th scope="col">Rental Date</th>
            <th scope="col">Return Date</th>
            <th scope="col">Completed</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($Mtn as $index => $mtn)
                <tr>
                    <td>{{ $mtn['maintenance_id'] }}</td>
                    <td>{{ $mtn['car_id'] }}</td>
                    <td>{{ $mtn['last_odometer'] }}</td>
                    <td>{{ $mtn['type'] }}</td>
                    <td>{{ $mtn['description'] }}</td>
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
                        <form action="{{ route('car.mtnEdit', $mtn['maintenance_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="maintenance_id" value="{{ $mtn['maintenance_id'] }}">
                            <input type="hidden" name="car_id" value="{{ $mtn['car_id'] }}">
                            <input type="hidden" name="last_odometer" value="{{ $mtn['last_odometer'] }}">
                            <input type="hidden" name="type" value="{{ $mtn['type'] }}">
                            <input type="hidden" name="description" value="{{ $mtn['description'] }}">
                            <input type="hidden" name="expense" value="{{ $mtn['expense'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" type="submit" name='submit'></button>
                        </form>
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.delete', $mtn['car_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="car_id" value="{{ $mtn['maintenance_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger bi-x-circle" type="submit" name='submit'></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
