@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl mb-4">Update student</div>
    @if (session('studentUpdateSuccess'))
    <div class="bg-green-100 text-green-700 py-2 px-4 rounded my-4" role="alert">
        <span class="block sm:inline">{{ session('studentUpdateSuccess') }}</span>
    </div> @endif
    <form class="w-full" action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col md:flex-row -mx-3">
            <div class="w-full md:w-1/2 px-3 md:mb-6">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="lastNameInput">
                    Last Name
                </label>
                <input
                    class="@error('last_name') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                    id="lastNameInput" type="text" name="last_name" value="{{ $student->last_name }}">
                @error('last_name')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="firstNameInput">
                    First Name
                </label>
                <input
                    class="@error('first_name') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                    id="firstNameInput" type="text" name="first_name" value="{{ $student->first_name }}">
                @error('first_name')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex -mx-3">
            <div class="w-full md:w-1/2 px-3 md:mb-6">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="gradeInput">
                    Grade
                </label>
                <div class="relative">
                    <select
                        class="@error('grade_id') is-invalid @enderror block appearance-none w-full bg-gray-100 py-3 px-4 pr-8 rounded mb-3 md:mb-0"
                        id="gradeInput" name="grade_id">
                        @foreach ($grades as $grade)
                        <option @if ($student->grade->id === $grade->id)
                            selected
                            @endif
                            value="{{ $grade->id }}">
                            {{ $grade->wording }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 md:mb-6">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="avatarInput">
                    Avatar
                </label>
                <input
                    class="@error('avatar') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                    type="file" id="avatarInput" name="avatar" aria-label="Avatar">
                @error('avatar')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
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