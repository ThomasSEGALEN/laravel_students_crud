@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl mb-4">Update grade</div>
    @if (session('gradeUpdateSuccess'))
    <div class="bg-green-100 text-green-700 py-2 px-4 rounded my-4" role="alert">
        <span class="block sm:inline">{{ session('gradeUpdateSuccess') }}</span>
    </div> @endif
    <form class="w-full" action="{{ route('grades.update', $grade) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col md:flex-row -mx-3">
            <div class="w-full md:w-1/2 px-3 md:mb-6">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="wordingInput">
                    Wording
                </label>
                <input
                    class="@error('wording') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                    id="wordingInput" type="text" name="wording" value="{{ $grade->wording }}">
                @error('wording')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-2 space-x-2">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                Submit
            </button>
            <button type="button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                onclick="window.location='{{ route('grades.index') }}'">
                Cancel
            </button>
        </div>
    </form>
</div>
@endsection