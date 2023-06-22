@extends('backsite.dashboard')

@section('content')

<div>
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