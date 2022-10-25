@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl mb-6">Show grade</div>
    <div class="flex flex-row space-x-10 my-6">
        <div class="flex flex-col space-y-1">
            <span>Wording : {{ $grade->wording }}</span>
            <ul>
                <span>Students :</span>
                @foreach ($students as $student)
                <li>{{ $student->last_name }} {{ $student->first_name }}</li>
                @endforeach
            </ul>
            <span>Create date : {{ $grade->created_at }}</span>
            <span>Update date : {{ $grade->updated_at }}</span>
        </div>
    </div>
    <button type="button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
        onclick="window.location='{{ route('grades.index') }}'">
        Cancel
    </button>
</div>
@endsection