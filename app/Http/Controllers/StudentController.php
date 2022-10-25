<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreStudentRequest;
use App\Imports\StudentsImport;
use App\Models\Grade;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::sortable()->orderBy('id')->paginate(20);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();

        return view('students.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        if ($request->avatar)
            $avatar_path = $request->file('avatar')->store('avatars', 'public');
        else
            $avatar_path = null;

        Student::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'avatar' => $avatar_path,
            'grade_id' => $request->grade_id
        ]);

        return back()->with('studentCreateSuccess', 'Student has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $grade = [
            'id' => $student->grade->id,
            'wording' => $student->grade->wording
        ];

        return view('students.show', compact('student', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $grades = Grade::all();

        return view('students.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        if ($request->avatar)
            $avatar_path = $request->file('avatar')->store('avatars', 'public');
        else
            $avatar_path = $student->avatar;

        $student->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'avatar' => $avatar_path,
            'grade_id' => $request->grade_id
        ]);

        return back()->with('studentUpdateSuccess', 'Student has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        $fullname = $student->first_name . ' ' . $student->last_name;

        return back()->with('studentDeleteSuccess', 'Student ' . $fullname . ' has been successfully deleted');
    }

    public function import()
    {
        return view('students.import');
    }

    public function importCSV(Request $request)
    {
        try {
            Excel::import(new StudentsImport, $request->file('csv_file'));
        } catch (Exception $e) {
            return back()->with('studentImportFailure', 'Students have not been successfully imported');
        }

        return back()->with('studentImportSuccess', 'Students have been successfully imported');
    }
}
