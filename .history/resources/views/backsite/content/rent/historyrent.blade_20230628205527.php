@extends('backsite.dashboard')

@section('content')

<div>
    <div class="mb-3">
        <h3>Rental History</h3>
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
            @foreach($Rent as $index => $rent)
                <tr>
                    <td>{{ $rent['rental_id'] }}</td>
                    <td>{{ $rent['car_id'] }}</td>
                    <td>{{ $rent['nik'] }}</td>
                    <td>{{ $rent['usage_region'] }}</td>
                    <td>{{ $rent['rental_date'] }}</td>
                    <td>{{ $rent['return_date'] }}</td>
                    <td>{{ $rent['is_completed'] ? 'Yes' : 'No' }}</td>
                    <td>
                        <button name="submit" type="button" class="btn btn-sm btn-outline-info rounded-pill bi-eye" data-bs-toggle="modal" data-bs-target="#basicModal{{ $rent['rental_id'] }}">
                        </button>
                        <div class="modal fade" id="basicModal{{ $rent['rental_id'] }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Rental Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <b>
                                                Rental ID :
                                            </b>
                                            {{ $rent['rental_id'] }}
                                        </p>
                                        <p>
                                            <b>
                                                NIK :
                                            </b>
                                            {{ $rent['nik'] }}
                                        </p>
                                        <p>
                                            <b>
                                                Name :
                                            </b>
                                            {{ $rent['name'] }}
                                        </p>
                                        <br>

                                        {{-- start car data --}}
                                        <p>
                                            <h4>
                                                CAR DATA
                                            </h4>
                                            <p>
                                                <b>
                                                    - Car ID :
                                                </b>
                                                {{ $rent['car_id'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Brand :
                                                </b>
                                                {{ $Car[$rent['car_id']]['brand'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Model :
                                                </b>
                                                {{ $Car[$rent['car_id']]['model'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Registration Number :
                                                </b>
                                                {{ $Car[$rent['car_id']]['registration_number'] }}
                                            </p>
                                        </p>
                                        <br>
                                        {{-- end car data --}}

                                        {{-- start rent detail --}}
                                        <p>
                                            <h4>
                                                RENTAL DETAIL
                                            </h4>
                                            <p>
                                                <b>
                                                    - Usage Region :
                                                </b>
                                                {{ $rent['usage_region'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Rent Fee :
                                                </b>
                                                Rp {{ $rent['total_price'] }},-
                                            </p>
                                            <p>
                                                <b>
                                                    - Rental Date :
                                                </b>
                                                {{ $rent['rental_date'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Return Date :
                                                </b>
                                                {{ $rent['return_date'] }}
                                            </p>
                                            <p>
                                                <b>
                                                    - Complete :
                                                </b>
                                                {{ $rent['is_completed'] ? 'Yes' : 'No' }}
                                            </p>
                                        </p>
                                        {{-- end rent detail --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('car.rentEdit', $rent['rental_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="rental_id" value="{{ $rent['rental_id'] }}">
                            <input type="hidden" name="user_id" value="{{ $rent['user_id'] }}">
                            <input type="hidden" name="car_id" value="{{ $rent['car_id'] }}">
                            <input type="hidden" name="nik" value="{{ $rent['nik'] }}">
                            <input type="hidden" name="name" value="{{ $rent['name'] }}">
                            <input type="hidden" name="usage_region" value="{{ $rent['usage_region'] }}">
                            <input type="hidden" name="rental_date" value="{{ $rent['rental_date'] }}">
                            <input type="hidden" name="return_date" value="{{ $rent['return_date'] }}">
                            <input type="hidden" name="total_price" value="{{ $rent['total_price'] }}">
                            <input type="hidden" name="is_completed" value="{{ $rent['is_completed'] }}">
                            <input type="hidden" name="brand" value="{{ $Car[$rent['car_id']]['brand'] }}">
                            <input type="hidden" name="model" value="{{ $Car[$rent['car_id']]['model'] }}">
                            <input type="hidden" name="color" value="{{ $Car[$rent['car_id']]['color'] }}">
                            <input type="hidden" name="registration_number" value="{{ $Car[$rent['car_id']]['registration_number'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" type="submit" name='submit'></button>
                        </form>
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.delete', $rent['rental_id']) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="rental_id" value="{{ $rent['rental_id'] }}">
                            <button class="btn btn-sm rounded-pill btn-outline-danger bi-x-circle" type="submit" name='submit'></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
