@extends('backsite.dashboard')

@section('content')

<div>
    <form action="{{ route('car.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Message
            </label>
            <textarea name="message" id="message" rows="5" class="form-control w-full p-2 border border-gray-400 rounded" placeholder="Type message here..."></textarea>
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