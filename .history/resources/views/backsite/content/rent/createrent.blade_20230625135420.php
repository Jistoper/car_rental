@extends('backsite.dashboard')

@section('content')

<div>
    <div>
        <h3 class="mb-3">
            Edit Car Data
        </h3>
    </div>
    <form action="{{ route('car.storeEdit') }}" method="POST" class="row g-3">
        @csrf
        <input type="hidden" name="car_id" id="car_id" value="{{ $data['car_id'] }}">
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="brand" id="brand" class="form-control @error('brand') border-red-500 @enderror" value="{{ $data['brand'] }}" placeholder="Brand">
                <label for="brand">Brand</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="model" id="model" class="form-control @error('model') border-red-500 @enderror" value="{{ $data['model'] }}" placeholder="Model">
                <label for="model">Model</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="color" id="color" class="form-control @error('color') border-red-500 @enderror" value="{{ $data['color'] }}" placeholder="Color">
                <label for="color">Color</label>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputDate" class="col-sm-2 col-form-label">Rent Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputDate" class="col-sm-2 col-form-label">Return Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="year" id="year" class="form-control @error('year') border-red-500 @enderror" value="{{ $data['year'] }}" placeholder="Year">
                <label for="year">Year</label>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" name="registration_number" id="registration_number" class="form-control @error('registration_number') border-red-500 @enderror" value="{{ $data['registration_number'] }}" placeholder="Registration Number">
            <label for="registration_number">Registration Number</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="vin" id="vin" class="form-control @error('vin') border-red-500 @enderror" value="{{ $data['vin'] }}" placeholder="VIN">
              <label for="vin">VIN</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" name="engine_number" id="engine_number" class="form-control @error('engine_number') border-red-500 @enderror" value="{{ $data['engine_number'] }}" placeholder="Engine Number">
            <label for="engine_number">Engine Number</label>
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