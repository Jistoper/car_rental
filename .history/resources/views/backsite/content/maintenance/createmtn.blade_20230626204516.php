@extends('backsite.dashboard')

@section('content')

<div>
  <div class="pagetitle row mb-3">
    <div class="col-md-1">
      <a type="button" href="{{ route('car.getListMtn') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
    </div>
    <h3 class="col-md-3">Add New Maintenance Data</h3>
  </div>
    <form action="{{ route('car.getListMtn') }}" method="POST" class="row g-3">
        @csrf
        {{-- <input type="hidden" name="maintenance_id" id="maintenance_id" value="{{ $data['maintenance_id'] }}"> --}}
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="car_id" id="car_id" class="form-control  @error('last_odometer') border-red-500 @enderror" value="{{ $data['car_id'] }}" placeholder="Car ID">
                <label for="car_id">Car ID</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="last_odometer" id="last_odometer" class="form-control @error('last_odometer') border-red-500 @enderror" value="{{ $data['last_odometer'] }}" placeholder="Last Odometer">
                <label for="last_odometer">Last Odometer</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" name="type" id="type" class="form-control @error('type') border-red-500 @enderror" value="{{ $data['type'] }}" placeholder="Type">
                <label for="type">Type</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" name="expense" id="expense" class="form-control @error('expense') border-red-500 @enderror" value="{{ $data['expense'] }}" placeholder="Expense">
                <label for="expense">Expense</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <textarea type="text" name="description" id="description" class="form-control @error('description') border-red-500 @enderror" placeholder="Description" style="height: 150px;">{{ $data['description'] }}</textarea>
                <label for="description">Description</label>
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