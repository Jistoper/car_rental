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
                    <td>{{ $rent['is_completed'] ? 'Yes' : 'No' }}
                        @if (!$rent['is_completed'])
                            <form action="{{ route('car.cnRentStat', $rent['rental_id']) }}" class="d-inline" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="rental_id" value="{{ $rent['rental_id'] }}">
                                <button class="btn btn-sm rounded-pill btn-outline-success bi-check2" type="submit" name='submit'></button>
                            </form>
                        @endif
                    </td>
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
                                        <form action="{{ route('car.rentStore') }}" method="POST" class="row g-3">
                                            @csrf
                                            <input type="hidden" name="car_id" id="car_id">
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand" disabled>
                                                    <label for="brand">Brand</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="model" id="model" class="form-control" placeholder="Model" disabled>
                                                    <label for="model">Model</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="color" id="color" class="form-control" placeholder="Color" disabled>
                                                    <label for="color">Color</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="Registration Number" disabled>
                                                    <label for="registration_number">Registration Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" name="nik" id="nik" class="form-control @error('nik') border-red-500 @enderror" placeholder="NIK">
                                                    <label for="nik">NIK</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" name="name" id="name" class="form-control @error('name') border-red-500 @enderror" placeholder="Name">
                                                    <label for="name">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" name="rent_date" id="rent_date" class="form-control" placeholder="Rent Date">
                                                    <label for="rent_date">Rent Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" name="return_date" id="return_date" class="form-control" placeholder="Return Date">
                                                    <label for="return_date">Return Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="usage_region" name="usage_region" aria-label="usage_region">
                                                        <option selected></option>
                                                        <option value="Sukun">Sukun</option>
                                                        <option value="Lowokwaru">Lowokwaru</option>
                                                        <option value="Klojen">Klojen</option>
                                                        <option value="Kedungkandang">Kedungkandang</option>
                                                        <option value="Blimbing">Blimbing</option>
                                                    </select>
                                                    <label for="usage_region">Usage Region</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Rent Fee">
                                                    <label for="total_price">Rent Fee</label>
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
                        <form onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('car.rentDelete', $rent['rental_id']) }}" class="d-inline" method="POST">
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
