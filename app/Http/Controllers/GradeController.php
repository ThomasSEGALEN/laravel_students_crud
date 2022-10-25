<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Imports\GradesImport;
use App\Models\Grade;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::sortable()->orderBy('id')->paginate(30);

        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        Grade::create([
            'wording' => $request->wording
        ]);

        return back()->with('gradeCreateSuccess', 'Grade has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        $students = $grade->students;

        return view('grades.show', compact('grade', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGradeRequest $request, Grade $grade)
    {
        $grade->update([
            'wording' => $request->wording
        ]);

        return back()->with('gradeUpdateSuccess', 'Grade has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return back()->with('gradeDeleteSuccess', 'Grade ' . $grade->wording . ' has been successfully deleted');
    }

    public function import()
    {
        return view('grades.import');
    }

    public function importCSV(Request $request)
    {
        try {
            Excel::import(new GradesImport, $request->file('csv_file'));
        } catch (Exception $e) {
            return back()->with('gradeImportFailure', 'Grades have not been successfully imported');
        }

        return back()->with('gradeImportSuccess', 'Grades have been successfully imported');
    }
}
