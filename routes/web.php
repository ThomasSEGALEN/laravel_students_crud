<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('students.index');
});

//DEBUG ROUTING : php artisan optimize

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/import', [StudentController::class, 'import'])->name('students.import');
Route::post('/students/import_csv', [StudentController::class, 'importCSV'])->name('students.import_csv');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
Route::get('/grades/import', [GradeController::class, 'import'])->name('grades.import');
Route::post('/grades/import_csv', [GradeController::class, 'importCSV'])->name('grades.import_csv');
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('grades.show');
Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('grades.update');
Route::delete('/grades/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');
Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
