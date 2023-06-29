@extends('backsite.dashboard')

@section('content')

<div>
  <div class="pagetitle row mb-3">
    <div class="col-md-1">
      <a type="button" href="{{ route('car.getListMtn') }}" class="btn btn-outline-danger rounded-pill bi-chevron-left"> Back</a>
    </div>
    <h3 class="col-md-3">Edit Maintenance Data</h3>
  </div>
  <form action="{{ route('car.mtnStoreEdit222') }}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <input type="hidden" name="maintenance_id" id="maintenance_id" value="{{ $data['maintenance_id'] }}">
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" name="car_id" id="car_id" class="form-control" value="{{ $data['car_id'] }}" placeholder="Car ID" disabled>
                <label for="car_id">Car ID</label>
            </div>
        </div>
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
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $data['registration_number'] }}" placeholder="Registration Number" disabled>
                <label for="registration_number">Registration Number</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="last_odometer" id="last_odometer" class="form-control" value="{{ $data['last_odometer'] }}" placeholder="Last Odometer" required>
                <label for="last_odometer">Last Odometer</label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                    Please provide the last odometer data.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="type" id="type" class="form-control" value="{{ $data['type'] }}" placeholder="Type" required>
                <label for="type">Type</label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                    Please provide the type of maintenance.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="Date" name="maintenance_date" id="maintenance_date" class="form-control" value="{{ $data['maintenance_date'] }}" placeholder="Date" required>
                <label for="maintenance_date">Date</label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                    Please provide the maintenance date.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" name="expense" id="expense" class="form-control" value="{{ $data['expense'] }}" placeholder="Expense" required>
                <label for="expense">Expense</label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                    Please provide the maintenance expense.
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <textarea type="text" name="description" id="description" class="form-control" placeholder="Description" style="height: 150px;" required>{{ $data['description'] }}</textarea>
                <label for="description">Description</label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                    Please provide description.
                </div>
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