@extends('backsite.dashboard')

@section('content')

<div>
    <div class="row mb-3">
      <div class="col-md-1">
        <a type="button" href="{{ route('car.getall') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
      </div>
      <h3 class="col-md-2">Add New Car</h3>
    </div>
    <form action="{{ route('car.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="brand" id="brand" class="form-control @error('brand') border-red-500 @enderror" value="{{ old('brand') }}" placeholder="Brand">
                <label for="brand">Brand</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
              <input type="text" name="model" id="model" class="form-control @error('model') border-red-500 @enderror" value="{{ old('model') }}" placeholder="Model">
              <label for="model">Model</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
              <input type="text" name="type" id="type" class="form-control @error('type') border-red-500 @enderror" value="{{ old('type') }}" placeholder="Type">
              <label for="type">Type</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="color" id="color" class="form-control @error('color') border-red-500 @enderror" value="{{ old('color') }}" placeholder="Color">
                <label for="color">Color</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
              <input type="text" name="capacity" id="capacity" class="form-control @error('capacity') border-red-500 @enderror" value="{{ old('capacity') }}" placeholder="Capacity">
              <label for="capacity">Capacity</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" name="year" id="year" class="form-control @error('year') border-red-500 @enderror" value="{{ old('year') }}" placeholder="Year">
                <label for="year">Year</label>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" name="registration_number" id="registration_number" class="form-control @error('registration_number') border-red-500 @enderror" value="{{ old('registration_number') }}" placeholder="Registration Number">
            <label for="registration_number">Registration Number</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="vin" id="vin" class="form-control @error('vin') border-red-500 @enderror" value="{{ old('vin') }}" placeholder="VIN">
              <label for="vin">VIN</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" name="engine_number" id="engine_number" class="form-control @error('engine_number') border-red-500 @enderror" value="{{ old('engine_number') }}" placeholder="Engine Number">
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