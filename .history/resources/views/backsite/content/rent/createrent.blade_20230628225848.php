@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row mb-3">
        <div class="col-md-1">
        <a type="button" href="{{ route('car.getListCar') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
        </div>
        <h3 class="col-md-4">Rent Car</h3>
    </div>
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
    </form><!-- End floating Labels Form -->
</div>

@endsection