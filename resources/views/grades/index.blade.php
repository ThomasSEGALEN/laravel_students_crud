@extends('layouts.app')

@section('content')
<div class="p-6 rounded overflow-hidden shadow-lg border">
    <div class="font-bold text-xl">Grades list</div>
    <div class="flex flex-col justify-between items-center md:flex-row-reverse my-4">
        <div class="space-x-2">
            <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded"
                onclick="window.location='{{ route('grades.create') }}'">
                Add grade
            </button>
            <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded"
                onclick="window.location='{{ route('grades.import') }}'">
                Import grade
            </button>
        </div>
        @if (session('gradeUpdateSuccess'))
        <div class="bg-blue-100 text-blue-700 py-2 px-4 rounded" role="alert">
            <span class="block sm:inline">{{ session('gradeUpdateSuccess') }}</span>
        </div>
        @elseif (session('gradeDeleteSuccess'))
        <div class="bg-red-100 text-red-700 py-2 px-4 rounded" role="alert">
            <span class="block sm:inline">{{ session('gradeDeleteSuccess') }}</span>
        </div>
        @endif
    </div>
    <table class="min-w-full text-center">
        <thead class="border-b bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4">
                    @sortablelink('id', '#')
                </th>
                </th>
                <th scope="col" class="px-6 py-4">
                    @sortablelink('wording', 'Wording')
                </th>
                <th scope="col" class="px-6 py-4">
                    @sortablelink('created_at', 'Create date')
                </th>
                <th scope="col" class="px-6 py-4">
                    @sortablelink('updated_at', 'Update date')
                </th>
                <th scope="col">Actions</th>
            </tr>
        </thead class="border-b">
        @foreach ($grades as $grade)
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 whitespace-nowrap">{{ $grade->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->wording }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->created_at }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->updated_at }}</td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                    <div class="flex space-x-2">
                        <a href="{{ route('grades.show', $grade) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">
                            Show
                        </a>
                        <a href="{{ route('grades.edit', $grade) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit
                        </a>
                        <form id="form-{{ $grade->id }}" action="{{ route('grades.destroy', $grade) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr class="bg-white border-b">
        </tbody>
        @endforeach
    </table>
    <div class="my-4">{{ $grades->onEachSide(0)->links() }}</div>
</div>
@endsection