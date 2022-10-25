<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    --}}
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-50 border-gray-200 px-4 py-4 rounded">
        <ul class="flex">
            <li class="mr-3">
                <a class="inline-block border rounded py-1 px-3 {{ Route::currentRouteNamed('students.index') || Route::currentRouteNamed('students.create') || Route::currentRouteNamed('students.edit') || Route::currentRouteNamed('students.show') || Route::currentRouteNamed('students.import') ? 'border-blue-500 bg-blue-500 text-white' : 'border-white bg-white text-blue-500' }}"
                    href="{{ route('students.index') }}">Students</a>
            </li>
            <li class="mr-3">
                <a class="inline-block border rounded py-1 px-3 {{ Route::currentRouteNamed('grades.index') || Route::currentRouteNamed('grades.create') || Route::currentRouteNamed('grades.edit') || Route::currentRouteNamed('grades.show') || Route::currentRouteNamed('grades.import') ? 'border-blue-500 bg-blue-500 text-white' : 'border-white bg-white text-blue-500' }}"
                    href="{{ route('grades.index') }}">Grades</a>
            </li>
        </ul>
    </nav>

    <div class="my-8 mx-5">
        @yield('content')
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script> --}}
</body>

</html>