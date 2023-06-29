@extends('backsite.dashboard')

@section('content')

<div>
    <div class="pagetitle row mb-3">
        <div class="col-md-1">
        <a type="button" href="{{ route('car.getCarMtn') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
        </div>
        <h3 class="col-md-4">Add New Maintenance Data</h3>
    </div>
    <form action="{{ route('car.storeMtn') }}" method="POST" class="row g-3">
        @csrf
        <input type="hidden" name="car_id" id="car_id" value="{{ Session::has('car_id') ? Session::get('car_id') : $data['car_id'] }}">
        <input type="hidden" name="brand" id="brand" value="{{ Session::has('brand') ? Session::get('brand') : $data['brand'] }}">
        <input type="hidden" name="model" id="model" value="{{ Session::has('model') ? Session::get('model') : $data['model'] }}">
        <input type="hidden" name="registration_number" id="registration_number" value="{{ Session::has('registration_number') ? Session::get('registration_number') : $data['registration_number'] }}">
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="car_id" id="car_id" class="form-control" value="{{ Session::has('car_id') ? Session::get('car_id') : $data['car_id'] }}" placeholder="Car ID" disabled>
                <label for="car_id">Car ID</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="brand" id="brand" class="form-control" value="{{ Session::has('brand') ? Session::get('brand') : $data['brand'] }}" placeholder="Brand" disabled>
                <label for="brand">Brand</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="model" id="model" class="form-control" value="{{ Session::has('model') ? Session::get('model') : $data['model'] }}" placeholder="Model" disabled>
                <label for="model">Model</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ Session::has('registration_number') ? Session::get('registration_number') : $data['registration_number'] }}" placeholder="Registration Number" disabled>
                <label for="registration_number">Registration Number</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="last_odometer" id="last_odometer" class="form-control" value="{{ Session::get('last_odometer') }}" placeholder="Last Odometer" required>
                <label for="last_odometer">Last Odometer</label>
                @error('last_odometer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ Session::get('type') }}" placeholder="Type">
                <label for="type">Type</label>
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="Date" name="date" id="date" class="form-control @error('date') border-red-500 @enderror" value="{{ Session::get('date') }}" placeholder="Date">
                <label for="date">Date</label>
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="expense" id="expense" class="form-control @error('expense') border-red-500 @enderror" value="{{ Session::get('expense') }}" placeholder="Expense">
                <label for="expense">Expense</label>
                @error('expense')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <textarea type="text" name="description" id="description" class="form-control @error('description') border-red-500 @enderror" placeholder="Description" style="height: 150px;">{{ Session::get('description') }}</textarea>
                <label for="description">Description</label>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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