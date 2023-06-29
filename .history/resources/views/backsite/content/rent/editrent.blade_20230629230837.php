@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row mb-3">
        <div class="col-md-1">
        <a type="button" href="{{ route('car.getListRent') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
        </div>
        <h3 class="col-md-4">Edit Rent Data</h3>
    </div>
    <form action="{{ route('car.rentStoreEdit', $data['rental_id']) }}" method="POST" class="row g-3">
        @csrf
        <input type="hidden" name="rental_id" id="rental_id" value="{{ $data['rental_id'] }}">
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
                <input type="text" name="nik" id="nik" class="form-control @error('nik') border-red-500 @enderror" placeholder="NIK" value="{{ $data['nik'] }}">
                <label for="nik">NIK</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" name="name" id="name" class="form-control @error('name') border-red-500 @enderror" placeholder="Name" value="{{ $data['name'] }}">
                <label for="name">Nama</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="date" name="rental_date" id="rental_date" class="form-control" placeholder="Rent Date" value="{{ $data['rental_date'] }}">
                <label for="rental_date">Rent Date</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="date" name="return_date" id="return_date" class="form-control" placeholder="Return Date" value="{{ $data['return_date'] }}">
                <label for="return_date">Return Date</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select class="form-select" id="usage_region" name="usage_region" aria-label="usage_region">
                    <option value="Sukun" {{ $data['usage_region'] === 'Sukun' ? 'selected' : '' }}>Sukun</option>
                    <option value="Lowokwaru" {{ $data['usage_region'] === 'Lowokwaru' ? 'selected' : '' }}>Lowokwaru</option>
                    <option value="Klojen" {{ $data['usage_region'] === 'Klojen' ? 'selected' : '' }}>Klojen</option>
                    <option value="Kedungkandang" {{ $data['usage_region'] === 'Kedungkandang' ? 'selected' : '' }}>Kedungkandang</option>
                    <option value="Blimbing" {{ $data['usage_region'] === 'Blimbing' ? 'selected' : '' }}>Blimbing</option>
                </select>
                <label for="usage_region">Usage Region</label>
            </div>
        </div>                
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select class="form-select" id="is_completed" name="is_completed" aria-label="is_completed">
                    <option value=1 {{ $data['is_completed'] ? 'selected' : '' }}>Yes</option>
                    <option value=0 {{ !$data['is_completed'] ? 'selected' : '' }}>No</option>
                </select>
                <label for="is_completed">Complete Status</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Rent Fee" value="{{ $data['total_price'] }}">
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
    </form> <!-- End floating Labels Form -->
</div>

@endsection