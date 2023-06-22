@extends('backsite.dashboard')

@section('content')

<div>
    <form class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
              <label for="floatingEmail">Brand</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Model</label>
            </div>
          </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
            <label for="floatingName">Your Name</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
            <label for="floatingTextarea">Address</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingCity" placeholder="City">
              <label for="floatingCity">City</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" aria-label="State">
              <option selected>New York</option>
              <option value="1">Oregon</option>
              <option value="2">DC</option>
            </select>
            <label for="floatingSelect">State</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
            <label for="floatingZip">Zip</label>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->
    <form action="{{ route('car.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-4">
                <input type="text" name="brand" id="brand" class="form-control @error('brand') border-red-500 @enderror" value="{{ old('brand') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-4">
                <input type="text" name="model" id="model" class="form-control @error('model') border-red-500 @enderror" value="{{ old('model') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-4">
                <input type="text" name="year" id="year" class="form-control @error('year') border-red-500 @enderror" value="{{ old('year') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Registration Number</label>
            <div class="col-sm-4">
                <input type="text" name="registration_number" id="registration_number" class="form-control @error('registration_number') border-red-500 @enderror" value="{{ old('registration_number') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">VIN</label>
            <div class="col-sm-4">
                <input type="text" name="vin" id="vin" class="form-control @error('vin') border-red-500 @enderror" value="{{ old('vin') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Engine Number</label>
            <div class="col-sm-4">
                <input type="text" name="engine_number" id="engine_number" class="form-control @error('engine_number') border-red-500 @enderror" value="{{ old('engine_number') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-4">
                <input type="text" name="color" id="color" class="form-control @error('color') border-red-500 @enderror" value="{{ old('color') }}">
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