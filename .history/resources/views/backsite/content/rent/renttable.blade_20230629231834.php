@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle">
        <h3>Rent Car</h3>
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
                        @if ($cars['is_available'])
                            <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary bi-pencil" data-bs-toggle="modal" data-bs-target="#AddRental{{ $cars['car_id'] }}"></button>
                            {{-- <form action="{{ route('car.rentView') }}" class="d-inline" method="POST">
                                @csrf
                                @method('GET')
                                <input type="hidden" name="car_id" value="{{ $cars['car_id'] }}">
                                <input type="hidden" name="brand" value="{{ $cars['brand'] }}">
                                <input type="hidden" name="model" value="{{ $cars['model'] }}">
                                <input type="hidden" name="registration_number" value="{{ $cars['registration_number'] }}">
                                <input type="hidden" name="color" value="{{ $cars['color'] }}">
                                <button class="btn btn-sm rounded-pill btn-outline-primary bi-handbag-fill" type="submit" name='submit'></button>
                            </form> --}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($Cars as $cars)
    <div class="modal fade" id="AddRental{{ $cars['car_id'] }}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Rental Data</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('car.rentStore', $data['car_id']) }}" method="POST" class="row g-3">
                        @csrf
                        <input type="hidden" name="car_id" id="car_id" value="{{ $data['car_id'] }}">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="brand" id="brand" class="form-control" value="{{ $data['brand'] }}" placeholder="Brand" disabled>
                                <label for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="model" id="model" class="form-control" value="{{ $data['model'] }}" placeholder="Model" disabled>
                                <label for="model">Model</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="color" id="color" class="form-control" value="{{ $data['color'] }}" placeholder="Color" disabled>
                                <label for="color">Color</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $data['registration_number'] }}" placeholder="Registration Number" disabled>
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
                </div>
                <div class="modal-footer">
                    <a href="{{ route('car.getListRent') }}" class="btn btn-outline-secondary rounded-pill">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection