@extends('backsite.dashboard')

@section('content')

<div>
    <form action="{{ route('car.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Brand :
            </label>
            <input type="text" name="brand" id="brand" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('brand') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Model :
            </label>
            <input type="text" name="model" id="model" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('model') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Year :
            </label>
            <input type="text" name="year" id="year" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('year') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Registration Number :
            </label>
            <input type="text" name="registration_number" id="registration_number" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('registration_number') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                VIN :
            </label>
            <input type="text" name="vin" id="vin" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('vin') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div><div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Engine Number :
            </label>
            <input type="text" name="engine_number" id="engine_number" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('engine_number') border-red-500 @enderror" value="{{ old('forum_title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Color :
            </label>
            <input type="text" name="color" id="color" class="p-1 form-input rounded-md shadow-sm border border-gray-300 @error('color') border-red-500 @enderror" value="{{ old('forum_title') }}">
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