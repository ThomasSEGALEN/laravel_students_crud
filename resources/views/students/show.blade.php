@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl mb-6">Show student</div>
    <div class="flex flex-row space-x-10 my-6">
        @if ($student->avatar)
        <img src="{{ $student->avatar }}" class="w-32 h-32 object-cover" alt="Avatar image">
        {{-- <img src="{{ asset('storage/' . $student->avatar) }}" class="img-fluid img-thumbnail" style="w-96"
            alt="Avatar image"> --}}
        @else
        <svg xmlns=" http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
            class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
        @endif
        <div class="flex flex-col space-y-1">
            <span>Last name : {{ $student->last_name }}</span>
            <span>First name : {{ $student->first_name }}</span>
            <span>Grade : {{ $grade['wording'] }} (ID: {{ $grade['id'] }})</span>
            <span>Create date : {{ $student->created_at }}</span>
            <span>Update date : {{ $student->updated_at }}</span>
        </div>
    </div>
    <button type="button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
        onclick="window.location='{{ route('grades.index') }}'">
        Cancel
    </button>
</div>
@endsection