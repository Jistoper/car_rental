@extends('backsite.dashboard')

@section('content')

<div>
  <div class="pagetitle row mb-3">
    <div class="col-md-1">
      <a type="button" href="{{ route('car.getall') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
    </div>
    <h3 class="col-md-2">Edit Car Data</h3>
  </div>
    <form action="{{ route('car.storeEdit') }}" method="POST" class="row g-3">
        @csrf
        <input type="hidden" name="maintenance_id" id="maintenance_id" value="{{ $data['maintenance_id'] }}">
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="last_odometer" id="last_odometer" class="form-control @error('last_odometer') border-red-500 @enderror" value="{{ $data['last_odometer'] }}" placeholder="Last Odometer">
                <label for="last_odometer">Last Odometer</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="type" id="type" class="form-control @error('type') border-red-500 @enderror" value="{{ $data['type'] }}" placeholder="Model">
                <label for="type">Type</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="color" id="color" class="form-control @error('color') border-red-500 @enderror" value="{{ $data['color'] }}" placeholder="Color">
                <label for="color">Color</label>
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