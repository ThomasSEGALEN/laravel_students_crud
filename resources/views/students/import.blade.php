@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl mb-4">Import student</div>
    @if (session('studentImportSuccess'))
    <div class="bg-green-100 text-green-700 py-2 px-4 rounded my-4" role="alert">
        <span class="block sm:inline">{{ session('studentImportSuccess') }}</span>
    </div>
    @elseif (session('studentImportFailure'))
    <div class="bg-red-100 text-red-700 py-2 px-4 rounded my-4" role="alert">
        <span class="block sm:inline">{{ session('studentImportFailure') }}</span>
    </div>
    @endif
    <form class="w-full" action="{{ route('students.import_csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex -mx-3">
            <div class="w-full md:w-1/2 px-3 md:mb-6">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="csvFileInput">
                    CSV File
                </label>
                <input class="appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0" type="file"
                    id="csvFileInput" name="csv_file" aria-label="CSV File">
            </div>
        </div>
        <div class="mb-2 space-x-2">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                Submit
            </button>
            <button type="button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                onclick="window.location='{{ route('students.index') }}'">
                Cancel
            </button>
        </div>
    </form>
</div>
@endsection