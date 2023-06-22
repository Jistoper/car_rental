@extends('backsite.dashboard')

@section('content')

<div>
    <form class="row g-3">
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
                <input type="text" name="color" id="color" class="form-control @error('color') border-red-500 @enderror" value="{{ old('color') }}" placeholder="Color">
                <label for="color">Color</label>
            </div>
        </div>
        <div class="col-md-3">
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
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->
    <form action="{{ route('car.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Registration Number</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">VIN</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Engine Number</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="flex items-center justify-end">
            <button class="flex items-center space-x-1 bg-slate-800 hover:bg-slate-700 text-white font-semibold py-2 px-4 rounded" onclick="getContent()" type="submit">
                <span>
                    Comment
                </span>
            </button>
        </div>
    </form>
</div>

@endsection